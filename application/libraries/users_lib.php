<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Users_lib
{
    private $id;
    private $emp_fname;
    private $emp_lname;
    private $emp_id;
    private $user_name;
    private $password;
    private $emp_role;
    private $status;
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

    public function getEmp_fname() {
        return $this->emp_fname;
    }

    public function setEmp_fname($emp_fname) {
        $this->emp_fname = $emp_fname;
    }

    public function getEmp_lname() {
        return $this->emp_lname;
    }

    public function setEmp_lname($emp_lname) {
        $this->emp_lname = $emp_lname;
    }

    public function getEmp_id() {
        return $this->emp_id;
    }

    public function setEmp_id($emp_id) {
        $this->emp_id = $emp_id;
    }

    public function getUser_name() {
        return $this->user_name;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmp_role() {
        return $this->emp_role;
    }

    public function setEmp_role($emp_role) {
        $this->emp_role = $emp_role;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
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
