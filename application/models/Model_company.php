<?php 
// lienreseausociaux
class Model_company extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/* get the brand data */
	public function getlienreseausociauxData()
	{
			$sql = "SELECT * FROM lienreseausociaux";
			$query = $this->db->query($sql);
			return $query->result();
	}

	public function update($id, $data)
	{
		if($data && $id) {
			$this->db->where('id', $id);
			$update = $this->db->update('lienreseausociaux', $data);

			return ($update == true) ? true : false;
		}
	}
	public function create($data = '')
	{
		$create = $this->db->insert('lienreseausociaux', $data);
		return ($create == true) ? true : false;
	}

	public function delete_lien($data)
    {  
       
      if($data) {
        $this->db->where($data);
        $delete = $this->db->delete('lienreseausociaux');
        return ($delete == true) ? true : false;
      }
    }

}