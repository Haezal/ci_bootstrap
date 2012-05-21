<?php
class Mymodel extends CI_Model {
            

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
        
	function get_one_value($value,$col,$table)
	{
		$this->db->select($col);
		$this->db->where($col,$value);
		$query = $this->db->get($table);
		if ($query->num_rows() > 0) return TRUE;
	}
	
	function get_one_value_2($value,$where,$table)
	{
		$this->db->select($value);
		$this->db->where($where[0],$where[1]);
		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			$data = $query->row_array();
			return $data[$value];
		}
	}
	
	function get_info($table,$where=0)
    {
		$this->db->select('*');
		$this->db->from($table);
		if($where != 0)
		{
			foreach($where as $key=>$val){
				$this->db->where($key, $val);
			}	
		}
		$query = $this->db->get();
				
        return $query->row_array();
    }
	
    function get_count($table,$where)
    {
		//$this->db->select('count(*) as cnt');
		
		$this->db->from($table);
		$this->db->where($where);
		//$query = $this->db->get();
		//$res = $query->row_array();
        return $this->db->count_all_results();
    }
    
    function get_info2($table,$where)
    {
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$query = $this->db->get();
        return $query->row_array();
    }
    
	function get_table_fields($table)
	{
		return $this->db->list_fields($table);
	}
	
	function insert_data($table,$data)
	{
		if ($this->db->insert($table, $data)) { 
			return $this->db->insert_id();
		}
		else return false;
	}

	function insert_log($table,$data)
	{
		$this->db->insert($table, $data); 
		return $this->db->insert_id();
	}
	
	function get_select_list($table,$cols=array('key' => 'id','val' => 'name'),$with_select=1, $where='x')
	{
		extract($cols);
		$this->db->order_by($val);
		if($where!='x')
			$this->db->where($where[0], $where[1]);
		$query = $this->db->get($table);
		$arr = $query->result_array();
		if ($with_select) $data[''] = '-- Select --';
		foreach ($arr as $k => $v){
			extract($v);
			$data[$$key] = $$val;
		}
		return $data;
	}
	
	function update_data($table,$key,$data)
	{
		$this->db->where($key);
		$this->db->update($table, $data); 
	}

	function delete_data($table,$where=0)
	{
		if($where != 0)
		{
			foreach($where as $key=>$val){
				$this->db->where($key, $val);
			}	
		}
		$this->db->delete($table); 
	}

	function get_list($table,$order,$where=0,$sort="asc")
	{
		$this->db->select('*');
		if ($where != 0) 
		{
			foreach($where as $key=>$val){
				$this->db->where($key, $val);
			}	
		}
		//$this->db->orderby($order, $sort);
		$query = $this->db->get($table);
		return $query->result_array();
	}
}
?>
