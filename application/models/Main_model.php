<?php
class Main_model extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('encryption');
    }

    public function updateSoldStatusM($propID, $newStatus)
    {
        if ($this->db->set('Sold_status', $newStatus)->where("Property_id", $propID)->update("property")) 
        {
            return true;
        }
    }

    public function validateUser($Log_key)
    {
        $username    = $this->input->post('username');
        $password = $this->input->post('password');
        $dateToday = date('Y/m/d');
        $timeEntry = date('H:i:s');
        
        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('username', $username);
        
        $query = $this->db->get();
        
        foreach ($query->result() as $r) {
            $password_from_db = $this->encryption->decrypt($r->password);

            if ($query->num_rows() == 1 && $password == $password_from_db) {
                
                $logEntry = array(
                    'LogKey'    => $Log_key, 
                    'Staff_ID'  => $r->Staff_ID,
                    'dateEntry' => $dateToday,
                    'timeIN'    => $timeEntry
                );

                $sessionData = array(
                    'User_Id'   => $r->Staff_ID,
                    'validated' => true,
                    'Log_key'   => $Log_key
                );

                if($this->storeTimeIn($logEntry)){
                    $this->session->set_userdata($sessionData);
                }
                return true;
            }
            return false;
        }
    }

    public function storeTimeIn($logEntry)
    {
        if ($this->db->insert("timeinout", $logEntry)) {
            return true;
        }
    }

    public function insertTimeOutM($Log_key, $data)
    {
        if ($this->db->set($data)->where("LogKey", $Log_key)->update("timeinout", $data)) 
        {
            return true;
        }
    }

    public function loadProperty($Property_id)
    {
       
        $this->db->select('*');
        $this->db->from('property');
        $this->db->join('user', 'property.User_Id_seller = user.User_Id');
        $this->db->where('property.Property_id', $Property_id);
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function loadUser()
    {
    
       $query = $this->db->get('user');

       return $query->result();
    }

    public function loadPropertyImages( $Property_id)
    {

        $this->db->select('*');
        $this->db->from('property_images');
        $this->db->where('property_images.Property_id', $Property_id);

        $query = $this->db->get();
        
        return $query->result();

    }

    public function insertImage($file_name, $id)
    {

        $ci_path = "http://[::1]/property_solutions_v2/assets/img/".$file_name;

        $data = array(
        'Property_id'  => $id,
        'Image'        => $ci_path
        );

        if ($this->db->insert("property_images", $data)) {
            return true;
        }
    }

    public function deleteImageM($image_id) 
    {
         if ($this->db->delete("property_images", "image_id = ".$image_id)) {
            return true;
         }
    }

    public function updatePropM($data, $prop_ID)
    {
        if ($this->db->set($data)->where("Property_id", $prop_ID)->update("property", $data)) 
        {
            return true;
        }
    }

    public function deletePropertyM($prop_ID)
    {
        if ($this->db->delete("property", "property_id = ".$prop_ID)) {
            return true;
        }
    }

    public function insertProperty($data)
    {
       if ($this->db->insert("property", $data)) {
            return true;
        }
    }

    public function loadSingleUser($User_Id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('User_Id', $User_Id);

        $query = $this->db->get();
        
        return $query->result();
    }

    public function insertNewInvoice($data)
    {
        if ($this->db->insert("invoice", $data)) {
            return true;
        }
    }

    public function viewInvoiceM()
    {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('user', 'invoice.User_Id_buyer = user.User_Id');
        $this->db->join('property', 'invoice.Property_ID = property.Property_id');
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function viewSpecificInvoiceM($Invoice_id)
    {
        $this->db->select('*');
        $this->db->from('invoice');
        $this->db->join('user', 'invoice.User_Id_buyer = user.User_Id');
        $this->db->join('property', 'invoice.Property_ID = property.Property_id');
        $this->db->join('staff', 'invoice.Admin_assisting_id = staff.staff_ID');
        $this->db->where('invoice.Invoice_ID', $Invoice_id);
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function deleteInvoiceM($Invoice_id)
    {
        if ($this->db->delete("invoice", "invoice_id = ".$Invoice_id)) {
            return true;
        }
    }

    public function recievePaymentM($dataForPayment)
    {
        if ($this->db->insert("payments", $dataForPayment)) {
            return true;
        }
    }

    public function updateInvoiceM($invoiceID, $dataForInvoiceTable)
    {
        if ($this->db->set($dataForInvoiceTable)->where("Invoice_ID", $invoiceID)->update("invoice", $dataForInvoiceTable)) 
        {
            return true;
        }
    }

    public function approvePropertyM($Prop_Id, $data)
    {
        if ($this->db->set($data)->where("Property_id", $Prop_Id)->update("property", $data)) 
        {
            return true;
        }
    }

    public function deleteUserM($User_Id) 
    {
         if ($this->db->delete("user", "User_Id = ".$User_Id)) {
            return true;
         }
    }

    public function insertUser($data)
    {
         if ($this->db->insert("user", $data)) {
            return true;
        }
    }

    public function insertStaff($data)
    {
         if ($this->db->insert("staff", $data)) {
            return true;
        }
    }

    public function loadStaff()
    {
    
       $query = $this->db->get('staff');

       return $query->result();
    }

    public function deleteStaffrM($staff_id) 
    {
         if ($this->db->delete("staff", "Staff_ID = ".$staff_id)) {
            return true;
         }
    }

    public function addMonthlyDueM($data)
    {
         if ($this->db->insert("monthly_due", $data)) {
            return true;
        }
    }

    public function loadMonthlyDues()
    {
        $this->db->select('*');
        $this->db->from('monthly_dues');
        $this->db->join('invoice', 'monthly_dues.Invoice_ID = invoice.Invoice_ID');
        $this->db->join('property', 'invoice.Property_id = property.Property_id');
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function viewPaymentsM()
    {
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->join('invoice', 'payments.Invoice_ID = invoice.Invoice_ID');
        $this->db->join('property', 'invoice.Property_id = property.Property_id');
        
        $query = $this->db->get();
        
        return $query->result();
    }

    public function purchaseRequestM()
    {
        $this->db->select('*');
        $this->db->from('property_queries');
        $this->db->join('user', 'property_queries.User_ID_prospect = user.User_Id');
        $this->db->join('property', 'property_queries.Property_id = property.Property_id');
        
        $query = $this->db->get();
        
        return $query->result();
    }

    
}
?>