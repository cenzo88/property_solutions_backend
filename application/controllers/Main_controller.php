<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url'); //url helper
        $this->load->database(); //manual connection to the database
        $this->load->model('Main_model');
        $this->load->helper('form'); //form validations
        $this->load->library('encryption'); //password
        $this->load->library('session'); //log in
        $this->check_isvalidated();
        
    }

	public function index()
	{
		$this->manageProperties();
	}

	private function check_isvalidated()
    {
        if (!$this->session->userdata('validated')) {
            redirect('Login_controller');
        }
    }

     public function logout()
    {
        $timeOut = date('H:i:s');
        $Log_key = $this->session->userdata('Log_key');

        $data = array(
            'timeOUT' => $timeOut
        );

        if($this->Main_model->insertTimeOutM($Log_key, $data)){
            $this->session->sess_destroy();
            redirect('Login_controller');
        } 
    }

    public function manageProperties(){

        $unsold = 'UNSOLD';
        $adminApproval = 1;

    	$this->db->select('*');
        $this->db->from('property');
        $this->db->join('user', 'property.User_Id_Seller = user.User_Id');
        $this->db->where('property.Sold_status', $unsold);
        $this->db->where('property.admin_approval', $adminApproval);
        $query = $this->db->get();

        $data['records'] = $query->result();

        $data['records2'] = $this->Main_model->loadUser();

    	$this->load->view('template/header');
		$this->load->view('manage_properties', $data);
		$this->load->view('template/footer');
    }

    public function viewProperty(){
        
        $Property_id = $this->uri->segment(3);

        $data['records'] = $this->Main_model->loadProperty($Property_id);

        $this->load->view('template/header');
        $this->load->view('view_property', $data);
        $this->load->view('template/footer');
    }

    public function updatePropertyView(){
        $Property_id = $this->uri->segment('3');
        $data['records'] = $this->Main_model->loadProperty($Property_id);
        $data['records2'] = $this->Main_model->loadPropertyImages($Property_id);

        $this->load->view('template/header');
        $this->load->view('updatePropertyView', $data);
        $this->load->view('template/footer');
    }

    public function do_upload(){         

        $id                             = $this->input->post('id');

        $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/property_solutions_v2/assets/img';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            echo "ERROR DETECTED";
            foreach ($error as $e) {
                echo $e;
            }
        }
        else
        {       
            $upload_data = $this->upload->data();

            $this->Main_model->insertImage($upload_data['file_name'], $id);

            $data = array('upload_data' => $this->upload->data());

            redirect($_SERVER['HTTP_REFERER']);
        }
      }

      public function deleteImage()
       {

            $image_id = $this->uri->segment('3');
            
            $this->db->select('Image')->
            from('property_images')->
            where('image_id', $image_id);

            $query = $this->db->get();

            $row = $query->result();

            foreach ($row as $r) {
              unlink($r->Image);
            }

            $this->Main_model->deleteImageM($image_id);

            redirect($_SERVER['HTTP_REFERER']);
       }

       public function updateProperty()
        {
            $data = array(
                'Property_title'        => $this->input->post('p_title'),
                'Property_detail'       => $this->input->post('p_details'),
                'Property_saleas'       => $this->input->post('p_soldas'),
                'Property_type'         => $this->input->post('p_type'),
                'pa_street'             => $this->input->post('pa_street'),
                'pa_barangay'           => $this->input->post('pa_barangay'),
                'pa_city'               => $this->input->post('pa_city'),
                'pa_province'           => $this->input->post('pa_province'),
                'Number_of_bedroom'     => $this->input->post('p_bed'),
                'Number_of_bathroom'    => $this->input->post('p_bath'),
                'Property_areasize'     => $this->input->post('p_area'),
                'Property_price'        => $this->input->post('p_price'),
                'admin_approval'        => $this->input->post('approval'),
                'Sold_status'           => $this->input->post('sold_status'),
            );

            $prop_ID = $this->input->post('prop_id');

            if (! $this->Main_model->updatePropM($data, $prop_ID)) 
            {
                $data['records'] = $this->Main_model->loadProperty($prop_ID);
                $data['records2'] = $this->Main_model->loadPropertyImages($prop_ID);

                $this->load->view('template/header');
                
                $this->load->view('template/footer');
            }
            else
            {
                $data['records'] = $this->Main_model->loadProperty($prop_ID);
                $data['records2'] = $this->Main_model->loadPropertyImages($prop_ID);

                $this->load->view('template/header');
                $this->load->view('success/update_prop_success');
                $this->load->view('template/footer');
            }
        }

        public function deleteProperty()
        {
            $Prop_ID = $this->uri->segment('3');

            if ($this->Main_model->deletePropertyM($Prop_ID)) {

                $this->load->view('template/header');
                $this->load->view('success/delete_prop_success');
                $this->load->view('template/footer');
            }      
        }

        public function addPropertyView()
        {
            $data['records'] = $this->Main_model->loadUser();

            $this->load->view('template/header');
            $this->load->view('addPropertyView',$data);
            $this->load->view('template/footer');
        } 

        public function addProperty()
        {
            $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/property_solutions_v2/assets/img';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 0;
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['overwrite']            = true;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $error = array('error' => $this->upload->display_errors());

                echo "ERROR DETECTED";
                foreach ($error as $e) {
                    echo $e;
                }
            }
            else
            {       
                $upload_data = $this->upload->data();
                $data = array('upload_data' => $this->upload->data());
            }

            $ci_path = "http://[::1]/property_solutions_v2/assets/img/".$upload_data['file_name'];

            $data = array(
                'Property_title'        => $this->input->post('p_title'),
                'Property_detail'       => $this->input->post('p_details'),
                'Property_saleas'       => $this->input->post('p_soldas'),
                'Property_type'         => $this->input->post('p_type'),
                'pa_street'             => $this->input->post('pa_street'),
                'pa_barangay'           => $this->input->post('pa_barangay'),
                'pa_city'               => $this->input->post('pa_city'),
                'pa_province'           => $this->input->post('pa_province'),
                'Number_of_bedroom'     => $this->input->post('p_bed'),
                'Number_of_bathroom'    => $this->input->post('p_bath'),
                'Property_areasize'     => $this->input->post('p_area'),
                'Property_price'        => $this->input->post('p_price'),
                'admin_approval'        => 'UAPPROVED',
                'Sold_status'           => 'UNSOLD',
                'Property_picmain'      => $ci_path
            );

            if($this->Main_model->insertProperty($data)){
                $this->load->view('template/header');
                $this->load->view('success/add_prop_success');
                $this->load->view('template/footer');
            }   
        }

        
        public function newInvoice()
        {
          $Property_ID = $this->input->post('prop_ID'); 
          $UserId = $this->input->post('User_Id');

          $data['records'] = $this->Main_model->loadProperty($Property_ID);
          $data['records2'] = $this->Main_model->loadSingleUser($UserId);

          $this->load->view('template/header');
          $this->load->view('addNewPurchaseInvoiceView', $data);
          $this->load->view('template/footer');
        }

        public function addInvoice()
        {
            $propID = $this->input->post('Property_Id');
            $data = array(
                'Property_ID' => $this->input->post('Property_Id'),
                'User_Id_Buyer' => $this->input->post('User_Id'),
                'Date_created' => $this->input->post('dateCreated'),
                'Payable_amount' => $this->input->post('payable_amount'),
                'Admin_assisting_id' => $this->input->post('adminAssisting'),
                'reservation_fee' =>$this->input->post('Reservation_fee'),
                'processing_fee' =>$this->input->post('proccess_fee'),
                'due_amount' =>$this->input->post('amount_due'),
                'pay_status' => "PENDING"
            );

           $newStatus = "SOLD";
           
           if($this->Main_model->insertNewInvoice($data) && $this->Main_model->updateSoldStatusM($propID, $newStatus)){
              $this->load->view('template/header');
              $this->load->view('success/addNewInvoiceSuccess');
              $this->load->view('template/footer');
           }

        }

        public function manageInvoiceView()
        {
                $data['records'] = $this->Main_model->viewInvoiceM();

                $this->load->view('template/header');
                $this->load->view('manage_invoice', $data);
                $this->load->view('template/footer');

        }

        public function deleteInvoice()
        {
            $Invoice_Id = $this->uri->segment('3');
            $propID = $this->uri->segment('4');
            
            $newStatus = "UNSOLD";

            if ($this->Main_model->deleteInvoiceM($Invoice_Id) && $this->Main_model->updateSoldStatusM($propID, $newStatus)) {

                $this->load->view('template/header');
                $this->load->view('success/delete_invoice_success');
                $this->load->view('template/footer');
            }      
        }

        public function viewThisInvoice()
        {
             $Invoice_Id = $this->uri->segment('3');

             $data['records'] = $this->Main_model->viewSpecificInvoiceM($Invoice_Id);

             $this->load->view('template/header');
             $this->load->view('viewSpecificInvoice', $data);
             $this->load->view('template/footer');
        }

        public function recievePayments()
        {
            $invoiceID = $this->input->post('invoiceID');
            $oldAmountPaid = $this->input->post('oldAmountPaid');
            $oldDueAmount = $this->input->post('oldDueAmount');
            $amountTendered = $this->input->post('amount_tendered');
            
            $paymentNote = $this->input->post('payment_note');

            if ($amountTendered > $oldDueAmount) {
                echo "alert('You have entered an amount greater than the due amount')";
            }else if ($amountTendered < 5000){
                 echo "alert('You have entered an amount less than the limited payment, contact your administrator')";
            }else if($amountTendered == $oldDueAmount){
                $newAmountPaid = $oldAmountPaid + $amountTendered;
                $newDueAmount = $dueAmount - $amountTendered;
                $today = date("Y/m/d");

                $dataForPayment = array(
                    'Invoice_ID' => $invoiceID,
                    'date' => $today,
                    'paid_amount' => $amountTendered,
                    'payment_note' => $paymentNote
                 );

                $dataForInvoiceTable = array(
                    'Invoice_ID' => $invoiceID,
                    'due_amount' => $newDueAmount,
                    'pay_status' => 'COMPLETED',
                    'amount_paid' => $newAmountPaid
                 );

                if($this->Main_model->recievePaymentM($dataForPayment)){
                    if($this->Main_model->updateInvoiceM($invoiceID, $dataForInvoiceTable)){
                        $this->load->view('template/header');
                        $this->load->view('success/add_payment_success');
                        $this->load->view('template/footer');
                    }else{

                    }
                }else{

                }

            }else{
                $newAmountPaid = $oldAmountPaid + $amountTendered;
                $newDueAmount = $oldDueAmount - $amountTendered;
                $today = date("Y/m/d");

                $dataForPayment = array(
                    'Invoice_ID' => $invoiceID,
                    'date' => $today,
                    'paid_amount' => $amountTendered,
                    'payment_note' => $paymentNote
                 );

                $dataForInvoiceTable = array(
                    'Invoice_ID' => $invoiceID,
                    'due_amount' => $newDueAmount,
                    'amount_paid' => $newAmountPaid
                 );

                if($this->Main_model->recievePaymentM($dataForPayment)){
                    if($this->Main_model->updateInvoiceM($invoiceID, $dataForInvoiceTable)){
                        $this->load->view('template/header');
                        $this->load->view('success/add_payment_success');
                        $this->load->view('template/footer');
                    }else{

                    }
                }else{

                }
            }
        }

        public function viewNewPropertySubmission()
        {
            $adminApproval = 0;

            $this->db->select('*');
            $this->db->from('property');
            $this->db->join('user', 'property.User_Id_Seller = user.User_Id');
            $this->db->where('property.admin_approval', $adminApproval);
            $query = $this->db->get();

            $data['records'] = $query->result();

            $this->load->view('template/header');
            $this->load->view('newSubmittedProperty', $data);
            $this->load->view('template/footer');
        }

        public function approveProperty()
        {
            $Prop_ID = $this->uri->segment('3');

            $data = array('admin_approval' => 1);

            if ($this->Main_model->approvePropertyM($Prop_ID, $data)) {

                $this->load->view('template/header');
                $this->load->view('success/property_approved_success');
                $this->load->view('template/footer');
            }  
        }

        public function manageUsers()
        {
            $data['records'] = $this->Main_model->loadUser();

            $this->load->view('template/header');
            $this->load->view('manage_users', $data);
            $this->load->view('template/footer');
        }

        public function deleteUser()
        {
            $User_Id = $this->uri->segment('3');

            if ($this->Main_model->deleteUserM($User_Id)) {

                $this->load->view('template/header');
                $this->load->view('success/delete_user_success');
                $this->load->view('template/footer');
            }  
        }

        public function addUserView()
        {
            $this->load->view('template/header');
            $this->load->view('addUserVIew');
            $this->load->view('template/footer');
        }

        public function addUser()
        {

            $cofirmPass = $this->input->post('userConfirmPassword');
            $inputtedPass = $this->input->post('userPassword');

            if ( $cofirmPass === $inputtedPass) {
                $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/property_solutions_v2/assets/img';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['overwrite']            = true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                    $error = array('error' => $this->upload->display_errors());

                    echo "ERROR DETECTED";
                    foreach ($error as $e) {
                        echo $e;
                    }
                }
                else
                {       
                    $upload_data = $this->upload->data();
                    $data = array('upload_data' => $this->upload->data());
                }

                $ci_path = "http://[::1]/property_solutions_v2/assets/img/".$upload_data['file_name'];

                $encPass  = $this->encryption->encrypt($inputtedPass);

                $data = array(
                    'User_lname'            => $this->input->post('userLname'),
                    'User_fname'            => $this->input->post('userFname'),
                    'User_emailadd'         => $this->input->post('userEmail'),
                    'User_password'         => $encPass,
                    'image'                 => $ci_path,
                    'User_contact'          => $this->input->post('userContact'),
                    'User_Address_Line1'    => $this->input->post('aline1'),
                    'User_Address_Line2'    => $this->input->post('aline2'),
                    'User_Address_Line3'    => $this->input->post('aline3')
                );

                if($this->Main_model->insertUser($data)){
                    $this->load->view('template/header');
                    $this->load->view('success/add_user_success');
                    $this->load->view('template/footer');
                }   
            }else{
                 echo "alert('Password do not match')";
            }

           
        }

        public function viewMessages()
        {
            $query = $this->db->get('messages');
            $data['records'] = $query->result();

            $this->load->view('template/header');
            $this->load->view('view_messages', $data);
            $this->load->view('template/footer');
        }

        public function managePersonelView()
        {
            $data['records'] = $this->Main_model->loadStaff();

            $this->load->view('template/header');
            $this->load->view('manage_staff', $data);
            $this->load->view('template/footer');
        }

        public function deleteStaff()
        {
            $staff_Id = $this->uri->segment('3');

            if ($this->Main_model->deleteStaffM($staff_Id)) {

                $this->load->view('template/header');
                $this->load->view('success/delete_staff_success');
                $this->load->view('template/footer');
            } 
        }

        public function addStaffView()
        {
            $this->load->view('template/header');
            $this->load->view('addStaffVIew');
            $this->load->view('template/footer');
        }

        public function addStaff()
        {
            $cofirmPass = $this->input->post('userConfirmPassword');
            $inputtedPass = $this->input->post('userPassword');

            if ( $cofirmPass === $inputtedPass) {
                $config['upload_path']          = $_SERVER['DOCUMENT_ROOT'].'/property_solutions_v2/assets/img';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['overwrite']            = true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                    $error = array('error' => $this->upload->display_errors());

                    echo "ERROR DETECTED";
                    foreach ($error as $e) {
                        echo $e;
                    }
                }
                else
                {       
                    $upload_data = $this->upload->data();
                    $data = array('upload_data' => $this->upload->data());
                }

                $ci_path = "http://[::1]/property_solutions_v2/assets/img/".$upload_data['file_name'];

                $encPass  = $this->encryption->encrypt($inputtedPass);

                $data = array(
                    'lname'                 => $this->input->post('userLname'),
                    'fname'                 => $this->input->post('userFname'),
                    'email'                 => $this->input->post('userEmail'),
                    'username'              => $this->input->post('username'),
                    'password'              => $encPass,
                    'image'                 => $ci_path,
                    'designation'           => $this->input->post('designation'),
                    'contactNumber'         => $this->input->post('userContact'),
                    'Staff_Address_Line1'    => $this->input->post('aline1'),
                    'Staff_Address_Line2'    => $this->input->post('aline2'),
                    'Staff_Address_Line3'    => $this->input->post('aline3')
                );

                if($this->Main_model->insertStaff($data)){
                    $this->load->view('template/header');
                    $this->load->view('success/add_user_success');
                    $this->load->view('template/footer');
                }   
            }else{
                 echo "<script type='text/javascript'>alert('Password do not match')</script>";
            }
        }

        public function viewPersonalDtr()
        {
           $staff_Id = $this->uri->segment('3');
           $monthToday = date("m");

           $query = $this->db->query("SELECT * FROM timeinout INNER JOIN staff ON timeinout.Staff_ID = staff.Staff_ID WHERE MONTH(dateEntry) = ".$monthToday." AND YEAR(dateEntry) = 2019 AND timeinout.Staff_ID =".$staff_Id);

           $data['records'] = $query->result();

           $this->load->view('template/header');
           $this->load->view('view_dtr', $data);
           $this->load->view('template/footer');
        }

        public function newMonthlyDue()
        {
            $data['records'] = $this->Main_model->viewInvoiceM();

            $this->load->view('template/header');
            $this->load->view('add_monthly_due', $data);
            $this->load->view('template/footer');
        }

        public function manageMonthlyDues()
        {
            $data['records'] = $this->Main_model->loadMonthlyDues();

            $this->load->view('template/header');
            $this->load->view('viewMonthlyDues', $data);
            $this->load->view('template/footer');

        }

        public function addMonthlyDue($value='')
        {

            $data = array(
                'Invoice_ID' => $this->input->post('invoice_ID'),
                'payable_period' => $this->input->post('payable_period'),
                'expected_monthly_rate' => $this->input->post('monthlyDue')
             );

            if($this->Main_model->addMonthlyDueM($data)){
                $this->load->view('template/header');
                $this->load->view('success/add_monthlyDue_success');
                $this->load->view('template/footer');
            }
        }

        public function viewPayments()
        {
            $data['records'] = $this->Main_model->viewPaymentsM();

            $this->load->view('template/header');
            $this->load->view('viewPayments', $data);
            $this->load->view('template/footer');

        }

        public function purchaseRequest()
        {
            $data['records'] = $this->Main_model->purchaseRequestM();

            $this->load->view('template/header');
            $this->load->view('view_purchase_request', $data);
            $this->load->view('template/footer');


        }

}
