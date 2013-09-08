<?php
class Receipts_lib {
    private $id;
    private $application_details_id;
    private $booking_details_id;
    private $receipt_id;
    private $deposit_amt;
    private $rent_amount;
    private $advance_amount;
    private $total_amount_paid;
    private $received_by;
    private $received_date;
    private $status;
    private $modified_by;
    private $modified_date;
    private $ipaddress;
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getApplication_details_id() {
        return $this->application_details_id;
    }

    public function setApplication_details_id($application_details_id) {
        $this->application_details_id = $application_details_id;
    }

    public function getBooking_details_id() {
        return $this->booking_details_id;
    }

    public function setBooking_details_id($booking_details_id) {
        $this->booking_details_id = $booking_details_id;
    }

    public function getReceipt_id() {
        return $this->receipt_id;
    }

    public function setReceipt_id($receipt_id) {
        $this->receipt_id = $receipt_id;
    }

    public function getDeposit_amt() {
        return $this->deposit_amt;
    }

    public function setDeposit_amt($deposit_amt) {
        $this->deposit_amt = $deposit_amt;
    }

    public function getRent_amount() {
        return $this->rent_amount;
    }

    public function setRent_amount($rent_amount) {
        $this->rent_amount = $rent_amount;
    }

    public function getAdvance_amount() {
        return $this->advance_amount;
    }

    public function setAdvance_amount($advance_amount) {
        $this->advance_amount = $advance_amount;
    }

    public function getTotal_amount_paid() {
        return $this->total_amount_paid;
    }

    public function setTotal_amount_paid($total_amount_paid) {
        $this->total_amount_paid = $total_amount_paid;
    }

    public function getReceived_by() {
        return $this->received_by;
    }

    public function setReceived_by($received_by) {
        $this->received_by = $received_by;
    }

    public function getReceived_date() {
        return $this->received_date;
    }

    public function setReceived_date($received_date) {
        $this->received_date = $received_date;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
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
