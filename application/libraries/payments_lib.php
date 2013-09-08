<?php
class Payments_lib {
    private $id;
    private $receipt_id;
    private $deposit_refund_amount;
	private $damage_amount;
    private $deposit_refund_by;
    private $deposit_refund_date;
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

    public function getReceipt_id() {
        return $this->receipt_id;
    }

    public function setReceipt_id($receipt_id) {
        $this->receipt_id = $receipt_id;
    }

    public function getDeposit_refund_amount() {
        return $this->deposit_refund_amount;
    }

    public function setDeposit_refund_amount($deposit_refund_amount) {
        $this->deposit_refund_amount = $deposit_refund_amount;
    }
	
	public function getDamage_amount() {
        return $this->damage_amount;
    }

    public function setDamage_amount($damage_amount) {
        $this->damage_amount = $damage_amount;
    }

    public function getDeposit_refund_by() {
        return $this->deposit_refund_by;
    }

    public function setDeposit_refund_by($deposit_refund_by) {
        $this->deposit_refund_by = $deposit_refund_by;
    }

    public function getDeposit_refund_date() {
        return $this->deposit_refund_date;
    }

    public function setDeposit_refund_date($deposit_refund_date) {
        $this->deposit_refund_date = $deposit_refund_date;
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
