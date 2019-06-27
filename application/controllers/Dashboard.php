<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function index(){
        $this->load->view('index');
    }
    
    public function loginPelanggan(){
        $this->load->view('Login');
    }
    public function loginAdmin(){
        $this->load->view('IndexAdmin');
    }
    public function historyPenyewaan(){
        $this->load->view('HistoryPenyewaan');
    }
    
    function home(){
        $data['content'] = "welcome";
        $this->load->view('home',$data);
    }
    function kelolaDataPelanggan(){
        $data['content'] = "KelolaDataPelanggan";
        $this->load->view('home',$data);
    }
    function kelolaDataPromosi(){
        $data['content'] = "KelolaDataPromosi";
        $this->load->view('home',$data);
    }
    function laporanPemesanan(){
        $data['content'] = "LaporanPemesanan";
        $this->load->view('home',$data);
    }
    function kelolaPegawai(){
        $data['content'] = "KelolaPegawai";
        $this->load->view('home',$data);
    }
    function kelolaPembuatanJasa(){
        $data['content'] = "KelolaPembuatanJasa";
        $this->load->view('home',$data);
    }
    function kelolaJasa(){
        $data['content'] = "KelolaJasa";
        $this->load->view('home',$data);
    }
    function monitoringDataPropertie(){
        $data['content'] = "MonitoringDataPropertie";
        $this->load->view('home',$data);
    }
    function pengadaanBarang(){
        $data['content'] = "PengadaanBarang";
        $this->load->view('home',$data);
    }
    function laporanPropertie(){
        $data['content'] = "LaporanPropertie";
        $this->load->view('home',$data);
    }
    function laporanPembuatanJasa(){
        $data['content'] = "LaporanPembuatanJasa";
        $this->load->view('home',$data);
    }
    function kelolaMitra(){
        $data['content'] = "KelolaMitra";
        $this->load->view('home',$data);
    }
    
   
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */