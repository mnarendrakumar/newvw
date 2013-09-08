<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Model
 *
 * @author raju
 */
class MY_Model extends Model {
    //put your code here
      function MY_Model()
	{
		parent::Model();
        }
        protected function getDBResult($sql,$type='object',$db='db')
	{
            //$query=$this->db->query($sql);
            $query=$this->db->query($sql);
            if($query->num_rows()>0)
                $result=$query->result($type);
            else
                $result=0;
            return $result;
	}

        protected  function saveRecord($obj,$table)
        {
            $return=0;
              
            if(array_key_exists('id',$obj) && !empty($obj->id) )
            {
               $this->db->update($table,$obj,array('id'=>$obj->id));
                $return++;
            }
            else
             {
                 $this->db->insert($table,$obj);
                 $return=$this->db->insert_id();
             }
             return $return;
        }
        //Get pagenation
        function getPagenationInfo($qry,$limit=25,$page=1,$qry2){
                $query = $this->db->query($qry);
                $cols=$query->num_rows();
                $total =$cols;
                $pager  = $this->pager->getPagerData($total, $limit, $page);
                if($total==0 )
                     $offset =0;
                else
                     $offset = $pager->offset;
                $limit  = $pager->limit;
                $page   = $pager->page;
                $limit2=array($offset => $limit);
                if($page<=1)
                {
                        $pg=0;
                }
                else
                {
                        $pg=($page-1)*$limit;
                }
                $qry2.=" Limit $pg,$limit";
                if($cols>0)
                {
                    $let=ceil($cols/$limit);
                    if($page==1)
                    {
                            $start=1;
                            $end=$limit;
                    }
                    else
                    {
                            $start=($page-1)*$limit+1;
                            $end=$start+$limit-1;
                    }

                    if($start+$limit>$cols) $frompage=$cols;
                    else    $frompage=$end;

                    $pageMessage= $start ." - ".$frompage." of ". $cols." Tickets";;
                }
                else
                {
                        $pageMessage="";
                        $let=1;
                }
                //echo '<pre>';
//                echo $qry;die;
                $result["table_data"]=$this->getDBResult($qry2,"array");
                $result["pagenation_info"]=array(
                                        "total_pages"=>$let,
                                        "range"=>$pageMessage
                                    );
                //print_r($result);
                return $result;

    }



}

