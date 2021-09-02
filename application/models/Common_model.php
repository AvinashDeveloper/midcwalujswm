<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Common_model extends CI_Model{
        /* Import excel file data here */
        public function excelInsert($tblName,$data){
            $this->db->insert_batch($tblName, $data);
        }
        
        /* sql exicute */
        public function excuteSql($sqlQuery){
            $query = $CI->db->query($sqlQuery);
            if($query->result_array()){
                return $query->result_array();
            } else {
                return false;
            }
        }
        
        /* updating data in datebase */
        public function update($table,$data,$where) {
            if(is_array($where)){
                foreach ($where as $key => $value){
                $this->db->where($key, $value);
                }
            } 
            $this->db->update($table, $this->db->escape_str($data));
            return true;
        }

        /* insert data in datebase */
        public function insert($table,$data){
            $query = $this->db->insert($table, $data); 
            return $this->db->insert_id();
        }

        /* delete data in datebase */
        public function delete($table,$id,$col = 'id'){
            $this->db->where($col, $id);
            $query = $this->db->delete($table); 
            return $query;
        }

        public function delete_rows($table,$where){
            if(is_array($where)){
                foreach ($where as $key => $value){
                $this->db->where($key, $value);
                }
            } 
            $query = $this->db->delete($table); 
            return $query;
        }

        /* select query */
        public function select($table, $where ='',$coloumn = '*'){
            $sql = "SELECT $coloumn FROM $table";
            if(!empty($where)){
            $sql .= " $where";
            }
            $query = $this->db->query($sql);
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function select_arr($table, $where ='',$coloumn = '*'){
            $this->db->select($coloumn);
            $this->db->from($table);
            if(is_array($where)){
                foreach ($where as $key => $value) {
                    $this->db->where($key,$value);
                }
            }
            $query = $this->db->get();
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

    }

?>