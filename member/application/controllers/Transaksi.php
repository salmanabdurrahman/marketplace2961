<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Mtransaksi");

        if (!isset($_SESSION["id_member"])) {
            $this->session->set_flashdata("pesan_error", "Silahkan login terlebih dahulu");
            redirect("login");
        }
    }

    public function index()
    {
        $id_member = $this->session->userdata("id_member");
        $data["transaksi"] = $this->Mtransaksi->transaksi_member_beli($id_member);
        $this->load->view("layout/header");
        $this->load->view("transaksi/transaksi_tampil", $data);
        $this->load->view("layout/footer");
    }

    public function detail($id_transaksi)
    {
        $input = $this->input->post();

        $this->form_validation->set_rules("id_transaksi_detail[]", "ID Transaksi Detail", "required");
        $this->form_validation->set_rules("jumlah_rating[]", "Jumlah Rating", "required");
        $this->form_validation->set_rules("ulasan_rating[]", "Ulasan Rating", "required");

        $this->form_validation->set_message("required", "%s harus diisi");

        $transaksi = $this->Mtransaksi->detail($id_transaksi);
        if (!$transaksi) {
            $this->session->set_flashdata("pesan_error", "Transaksi tidak ditemukan.");
            redirect('transaksi');
        }

        if ($this->form_validation->run() == TRUE) {
            $this->Mtransaksi->buat_rating($input);
            $this->session->set_flashdata("pesan_sukses", "Ulasan produk berhasil dibuat");
            redirect("transaksi/detail/$id_transaksi");
        }

        // Load Midtrans library
        require_once('vendor/autoload.php');
        \Midtrans\Config::$serverKey = $_ENV['MIDTRANS_SERVER_KEY'];
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $transaksi = $this->Mtransaksi->detail($id_transaksi);
        $order_id = $transaksi["kode_transaksi"] ?? rand();
        $gross_amount = $transaksi["total_transaksi"] ?? 0;

        $params = [
            'transaction_details' => [
                'order_id' => $order_id,
                'gross_amount' => $gross_amount
            ]
        ];

        $data = [
            "snapToken" => null,
            "fromMidtrans" => null,
            "transaksi" => $transaksi,
            "transaksi_detail" => $this->Mtransaksi->transaksi_detail($id_transaksi)
        ];

        try {
            $data["snapToken"] = \Midtrans\Snap::getSnapToken($params);
        } catch (\Exception $e) {
        }

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', 'https://api.sandbox.midtrans.com/v2/' . $order_id . '/status', [
                'headers' => [
                    'accept' => 'application/json',
                    'Authorization' => 'Basic ' . base64_encode($_ENV['MIDTRANS_SERVER_KEY'] . ':'),
                ],
            ]);

            if ($response->getStatusCode() == 200) {
                $data["fromMidtrans"] = json_decode($response->getBody(), true);
            }

            if (isset($data["fromMidtrans"]["transaction_status"]) && $data["fromMidtrans"]["transaction_status"] === 'settlement') {
                $this->Mtransaksi->ubah_status($id_transaksi, 'lunas');
            }

            if (isset($data["fromMidtrans"]["transaction_status"]) && $data["fromMidtrans"]["transaction_status"] === 'expire') {
                $this->Mtransaksi->ubah_status($id_transaksi, 'batal');
            }
        } catch (\Exception $e) {
        }

        $this->load->view("layout/header");
        $this->load->view("transaksi/transaksi_detail", $data);
        $this->load->view("layout/footer");
    }
}