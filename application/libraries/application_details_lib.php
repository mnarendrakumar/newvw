<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_details_lib{
    private $id;
    private $application_id;
    private $customer_id;
    private $applicant_name;
    private $phone_no;
    private $applicant_address;
    private $address_proof;
    private $image_path;
    private $vip_quota;
    private $vip_ref_by;
	private $no_of_persons;
    private $created_by;
    private $created_date;
    private $modified_by;
    private $modified_date;
    private $ipaddress;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getApplication_id() {
        return $this->application_id;
    }

    public function setApplication_id($application_id) {
        $this->application_id = $application_id;
    }

    public function getCustomer_id() {
        return $this->customer_id;
    }

    public function setCustomer_id($customer_id) {
        $this->customer_id = $customer_id;
    }

    public function getApplicant_name() {
        return $this->applicant_name;
    }

    public function setApplicant_name($applicant_name) {
        $this->applicant_name = $applicant_name;
    }

    public function getPhone_no() {
        return $this->phone_no;
    }

    public function setPhone_no($phone_no) {
        $this->phone_no = $phone_no;
    }

    public function getApplicant_address() {
        return $this->applicant_address;
    }

    public function setApplicant_address($applicant_address) {
        $this->applicant_address = $applicant_address;
    }

    public function getAddress_proof() {
        return $this->address_proof;
    }

    public function setAddress_proof($address_proof) {
        $this->address_proof = $address_proof;
    }

    public function getImage_path() {
        return $this->image_path;
    }

    public function setImage_path($image_path) {
        $this->image_path = $image_path;
    }

    public function getVip_quota() {
        return $this->vip_quota;
    }

    public function setVip_quota($vip_quota) {
        $this->vip_quota = $vip_quota;
    }

    public function getVip_ref_by() {
        return $this->vip_ref_by;
    }

    public function setVip_ref_by($vip_ref_by) {
        $this->vip_ref_by = $vip_ref_by;
    }
	
	public function getNo_of_persons() {
        return $this->no_of_persons;
    }

    public function setNo_of_persons($no_of_persons) {
        $this->no_of_persons = $no_of_persons;
    }

    public function getCreated_by() {
        return $this->created_by;
    }

    public function setCreated_by($created_by) {
        $this->created_by = $created_by;
    }

    public function getCreated_date() {
        return $this->created_date;
    }

    public function setCreated_date($created_date) {
        $this->created_date = $created_date;
    }

    public function getModified_by() {
        return $this->modified_by;
    }

    public function setModified_by($modified_by) {
        $this->modified_by = $modified_by;
    }

    public function getModified_date() {
        return $this->modified_date;
    }

    public function setModified_date($modified_date) {
        $this->modified_date = $modified_date;
    }

    public function getIpaddress() {
        return $this->ipaddress;
    }

    public function setIpaddress($ipaddress) {
        $this->ipaddress = $ipaddress;
    }

}
?>
