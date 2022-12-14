<?php
defined('BASEPATH') or exit('No direct script access allowed');

  class Reportbonus_excel extends CI_Controller 
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('admin/Reportbonus_excel_model', 'excel');
    }

    public function index()
    {
      $data = [
          'view' => 'admin/reportbonus_excel',
          'active' => 'reportbonus_excel',
          'sub1' => 'reportbonus_excel',
      ];

      $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
      $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
      if(empty($tgl_awal) or empty($tgl_akhir))
      { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
          $export = $this->excel->view_all();  // Panggil fungsi view_all yang ada di exportModel
          $url_export = 'reportbonus_excel/export';
          $label = 'Semua Data Bonus';
      } else { // Jika terisi
          $export = $this->excel->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di exportModel
          $url_export = 'reportbonus_excel/export?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
          $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
          $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
          $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
      }
      
      $data['export'] = $export;
      $data['url_export'] = base_url('admin/'.$url_export);
      $data['label'] = $label;
      $this->load->view('template_admin/index', $data);

    }

    public function export()
    {
      // Load plugin PHPExcel nya
      include APPPATH.'third_party/PHPExcel/PHPExcel.php';
      // Panggil class PHPExcel nya
      $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
              ->setLastModifiedBy('My Notes Code')
              ->setTitle("Data Bonus")
              ->setSubject("Bonus")
              ->setDescription("Laporan Semua Data Bonus")
              ->setKeywords("Data Bonus");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
          'font' => array('bold' => true), // Set font nya jadi bold
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
          'borders' => array(
          'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
          );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
          );
        $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir))
        { // Cek jika tgl_awal atau tgl_akhir kosong, maka :
          $export = $this->excel->view_all();
          $label = 'Semua Data export';
        } else { // Jika terisi
          $export = $this->excel->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di exportModel
          $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
          $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
          $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

        $data['label'] = $label;
        $data['export'] = $export;
          $excel->setActiveSheetIndex(0);
          $excel->getActiveSheet()->setCellValue('A1', "DATA BONUS"); 
          $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
          $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
          $excel->getActiveSheet()->setCellValue('A2', $label); // Set kolom A2 sesuai dengan yang pada variabel $label
          $excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A2 sampai E2
          // Buat header tabel nya pada baris ke 4
          $excel->getActiveSheet()->setCellValue('A4', "Tanggal"); 
          $excel->getActiveSheet()->setCellValue('B4', "Nama User"); 
          $excel->getActiveSheet()->setCellValue('C4', "Jumlah Bonus"); 
          $excel->getActiveSheet()->setCellValue('D4', "Catatan"); 
          // Apply style header yang telah kita buat tadi ke masing-masing kolom header
          $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
          $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
          // Set height baris ke 1, 2, 3 dan 4
          $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
          $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
          $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
          $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
          $no = 1; // Untuk penomoran tabel, di awal set dengan 1
          $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5

      foreach($export as $data)
      { 
            $tanggal_bonus = date('d-m-Y', strtotime($data->tanggal_bonus)); // Ubah format tanggal jadi dd-mm-yyyy
            $excel->getActiveSheet()->setCellValue('A'.$numrow, $tanggal_bonus);
            $excel->getActiveSheet()->setCellValue('B'.$numrow, $data->nama_lengkap);
            $excel->getActiveSheet()->setCellValue('C'.$numrow, $data->jml_bonus);
            $excel->getActiveSheet()->setCellValue('D'.$numrow, $data->catatan);
            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
      }
      
          // Set width kolom
          $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
          $excel->getActiveSheet()->getColumnDimension('B')->setWidth(18); // Set width kolom B
          $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
          $excel->getActiveSheet()->getColumnDimension('D')->setWidth(40); // Set width kolom D
          // Set orientasi kertas jadi LANDSCAPE
          $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
          // Set judul file excel nya
          $excel->getActiveSheet()->setTitle("Laporan Data Bonus");
          $excel->getActiveSheet();
          // Proses file excel
          header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
          header('Content-Disposition: attachment; filename="Data Bonus.xlsx"'); // Set nama file excel nya
          header('Cache-Control: max-age=0');
          $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
          $write->save('php://output');
      }
  }