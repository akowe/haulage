<?php
/**
 * This function is used to display data in PDF file.
 * function is using mpdf api to generate pdf.
 * @param number $id : This is unique id of table.
 */
class M_pdf
{

	function generatePDF($id)
	{
		require APPPATH . '/third_party/mpdf/vendor/autoload.php';
//$mpdf=new mPDF();
		$mpdf = new mPDF('utf-8', 'Letter', 0, '', 0, 0, 7, 0, 0, 0);

		$checkRecords = $this->user_model->getCheckInfo($id);
		foreach ($checkRecords as $key => $value) {
			$data['info'] = $value;
			$filename = $this->load->view(CHEQUE_VIEWS . 'index', $data, TRUE);
			$mpdf->WriteHTML($filename);
		}

		$mpdf->Output(); //output pdf document.
//$content = $mpdf->Output('', 'S'); //get pdf document content's as variable.

	}
}
