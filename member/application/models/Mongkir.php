<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mongkir extends CI_Model
{
    private $api_key;
    private $base_url = "https://rajaongkir.komerce.id/api/v1";

    public function __construct()
    {
        parent::__construct();
        $this->api_key = $_ENV['RAJA_ONGKIR_API_KEY'];
    }

    public function cari_lokasi($keyword)
    {
        $endpoint = "/destination/domestic-destination?search=" . urlencode($keyword);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->base_url}{$endpoint}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: {$this->api_key}"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return ['error' => true, 'message' => 'Koneksi ke API Gagal: ' . $err];
        }

        $result = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'RajaOngkir Non-JSON Response: ' . $response);
            return ['error' => true, 'message' => 'Format Respons API Tidak Valid.'];
        }

        if (isset($result['meta']['status']) && $result['meta']['status'] !== 'success') {
            return ['error' => true, 'message' => $result['meta']['message'] ?? 'Terjadi kesalahan pada API.'];
        }

        if (isset($result['data']) && is_array($result['data'])) {
            return ['error' => false, 'data' => $result['data']];
        }

        return ['error' => true, 'message' => 'Struktur data API tidak dikenali.'];
    }

    public function tampil_distrik()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $_ENV['RAJA_ONGKIR_API_KEY']
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $result = json_decode($response, true);

            if (isset($result['rajaongkir']['results'])) {
                return $result['rajaongkir']['results'];
            } else {
                return [];
            }
        }
    }

    public function detail_distrik($city_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=" . $city_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $_ENV['RAJA_ONGKIR_API_KEY']
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $result = json_decode($response, true);

            if (isset($result['rajaongkir']['results'])) {
                return $result['rajaongkir']['results'];
            } else {
                return [];
            }
        }
    }

    public function cek_biaya_ongkir($origin, $destination, $weight, $courier = 'jne:sicepat:jnt:ninja:tiki:lion:anteraja')
    {
        if (empty($origin) || empty($destination)) {
            return ['error' => true, 'message' => 'Origin atau Destination kosong'];
        }

        $data_to_post = [
            'origin' => (string) $origin,
            'destination' => (string) $destination,
            'weight' => (int) $weight,
            'courier' => (string) $courier,
            'price' => 'lowest'
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "{$this->base_url}/calculate/domestic-cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => http_build_query($data_to_post),
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "key: {$this->api_key}"
            ),
            CURLOPT_TIMEOUT => 30,
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return ['error' => true, 'message' => 'Koneksi ke API Gagal: ' . $err];
        }

        $result = json_decode($response, true);

        if (isset($result['meta']['status']) && $result['meta']['status'] === 'success' && isset($result['data'])) {
            return ['error' => false, 'data' => $result['data']];
        } else {
            log_message('error', "RajaOngkir Cost API Response Error: " . $response);
            return ['error' => true, 'message' => $result['meta']['message'] ?? 'Gagal menghitung ongkir.'];
        }
    }
}
