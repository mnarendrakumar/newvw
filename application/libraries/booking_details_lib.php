<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Booking_details_lib{
    private $id;
    private $application_details_id;
    private $blocks_id;
    private $rooms_id;
    private $from_date;
    private $to_date;
    private $checkout_date;
    private $no_of_days;
    private $booking_type;
    private $booked_status;
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

    public function getApplication_details_id() {
        return $this->application_details_id;
    }

    public function setApplication_details_id($application_details_id) {
        $this->application_details_id = $application_details_id;
    }

    public function getBlocks_id() {
        return $this->blocks_id;
    }

    public function setBlocks_id($blocks_id) {
        $this->blocks_id = $blocks_id;
    }

    public function getRooms_id() {
        return $this->rooms_id;
    }

    public function setRooms_id($rooms_id) {
        $this->rooms_id = $rooms_id;
    }

    public function getFrom_date() {
        return $this->from_date;
    }

    public function setFrom_date($from_date) {
        $this->from_date = $from_date;
    }

    public function getTo_date() {
        return $this->to_date;
    }

    public function setTo_date($to_date) {
        $this->to_date = $to_date;
    }

    public function getCheckout_date() {
        return $this->checkout_date;
    }

    public function setCheckout_date($checkout_date) {
        $this->checkout_date = $checkout_date;
    }

    public function getNo_of_days() {
        return $this->no_of_days;
    }

    public function setNo_of_days($no_of_days) {
        $this->no_of_days = $no_of_days;
    }

    public function getBooking_type() {
        return $this->booking_type;
    }

    public function setBooking_type($booking_type) {
        $this->booking_type = $booking_type;
    }

    public function getBooked_status() {
        return $this->booked_status;
    }

    public function setBooked_status($booked_status) {
        $this->booked_status = $booked_status;
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
