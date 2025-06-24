<?php

class DbHelper
{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "solo_parent";
    private $conn;


    // Constructor to initialize the database connection
    public function __construct()
    {
        // Create the connection
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);

        // Check connection and throw error if failed
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Destructor to close the connection
    public function __destruct()
    {
        $this->conn->close();
    }

    //insert_Id

    public function getInsertId() {
        return $this->conn->insert_id;
    }

    // Method to prepare a statement with error handling
    public function prepare($query)
    {
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            // Detailed error message if preparation fails
            die('MySQL prepare error: ' . $this->conn->error);
        }
        return $stmt;
    }

    // Method to execute a query
    public function executeQuery($query)
    {
        if ($this->conn->query($query) === false) {
            // Handle query execution failure
            die('MySQL query execution error: ' . $this->conn->error);
        }
        return true;
    }

    // Method to get all records
   public function getAllRecords($table, $where = "") {
        $sql = "SELECT * FROM `$table`";
        if ($where) {
            $sql .= " WHERE $where";
        }
        $result = $this->conn->query($sql);
        $records = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $records[] = $row;
            }
        }
        return $records;
    }

    // Method to get a single record
    public function getRecord($table, $args)
    {
        $keys = array_keys($args);
        $values = array_values($args);
        $condition = [];
        for ($i = 0; $i < count($keys); $i++) {
            $condition[] = "`" . $keys[$i] . "` = '" . $values[$i] . "'";
        }
        $cond = implode(" AND ", $condition);
        $sql = "SELECT * FROM `$table` WHERE $cond";
        $query = $this->conn->query($sql);
        if ($query === false) {
            die('MySQL query error: ' . $this->conn->error);
        }
        return $query->fetch_assoc();
    }

    // Method to delete a record
    public function deleteRecord($table, $args)
    {
        $keys = array_keys($args);
        $values = array_values($args);
        $condition = [];
        for ($i = 0; $i < count($keys); $i++) {
            $condition[] = "`" . $keys[$i] . "` = '" . $values[$i] . "'";
        }
        $cond = implode(" AND ", $condition);
        $sql = "DELETE FROM `$table` WHERE $cond";
        $this->conn->query($sql);
        if ($this->conn->affected_rows === -1) {
            die('MySQL delete error: ' . $this->conn->error);
        }
        return $this->conn->affected_rows;
    }

    // Method to add a record
    public function addRecord($table, $args)
    {
        $keys = array_keys($args);
        $values = array_values($args);
        $key = implode("`, `", $keys);
        $value = implode("', '", $values);
        $sql = "INSERT INTO `$table` (`$key`) VALUES ('$value')";
        if ($this->conn->query($sql) === false) {
            die('MySQL insert error: ' . $this->conn->error);
        }
        return $this->conn->affected_rows;
    }

    // Method to update a record
    public function updateRecord($table, $args)
    {
        $keys = array_keys($args);
        $values = array_values($args);
        $condition = [];
        for ($i = 1; $i < count($keys); $i++) {
            $condition[] = "`" . $keys[$i] . "` = '" . $values[$i] . "'";
        }
        $sets = implode(", ", $condition);
        $sql = "UPDATE `$table` SET $sets WHERE `$keys[0]` = '$values[0]'";
        if ($this->conn->query($sql) === false) {
            die('MySQL update error: ' . $this->conn->error);
        }
        return $this->conn->affected_rows;
    }

    // Joining tables

    public function Joiningtables($id)
{
    $sql = "
        SELECT 
    solo_parent.id, 
    solo_parent.fullname,
    solo_parent.id_no,
    solo_parent.philsys_card_number,
    solo_parent.date_of_birth,
    solo_parent.age,
    solo_parent.place_of_birth,
    solo_parent.sex,
    solo_parent.address,
    solo_parent.civil_status,
    solo_parent.educational_attainment,
    solo_parent.occupation,
    solo_parent.religion,
    solo_parent.company_agency,
    solo_parent.monthly_income,
    solo_parent.employment_status,
    solo_parent.contact_number,
    solo_parent.email_address,
    solo_parent.pantawid_beneficiary,
    solo_parent.indigenous_person,
    solo_parent.are_you_a_migrant_worker,
    solo_parent.lgbtq,
    GROUP_CONCAT(
        CONCAT(
            familymembers.id, '|',
            familymembers.name, '|',
            familymembers.sex, '|',
            familymembers.relationship, '|',
            familymembers.age, '|',
            familymembers.birthdate, '|',
            familymembers.civil_status, '|',
            familymembers.educational_attainment, '|',
            familymembers.occupation, '|',
            familymembers.monthly_income, '|',
            familymembers.solo_parent_reason, '|',
            familymembers.solo_parent_needs, '|',
            familymembers.emer_name, '|',
            familymembers.emer_relationship, '|',
            familymembers.emer_address, '|',
            familymembers.emer_contact_num, '|',
            familymembers.solo_parent_card_number, '|',
            familymembers.date_issuances, '|',
            familymembers.solo_parent_category, '|',
            familymembers.beneficiary_code
        )
        SEPARATOR ';'
    ) AS familymembers_data
FROM 
    solo_parent
LEFT JOIN 
    familymembers ON familymembers.user_id = solo_parent.id
WHERE 
    solo_parent.id = ?
GROUP BY 
    solo_parent.id;

    ";

    $stmt = $this->conn->prepare($sql);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $this->conn->error);
    }

    $stmt->bind_param("i", $id);
    
    if (!$stmt->execute()) {
        die('Execute error: ' . $stmt->error);
    }
    
    $result = $stmt->get_result();
    $p_order = array();
    while ($row = $result->fetch_assoc()) {
        // Process the familymembers_data field
        if (!empty($row['familymembers_data'])) {
            // Split the semicolon-separated family members data
            $family_members = explode(';', $row['familymembers_data']);
            $family_members_details = array();

            // Loop through each family member and split by '|'
            foreach ($family_members as $member) {
                $member_details = explode('|', $member);
                // Map the details to an associative array for easier access
                $family_members_details[] = array(
                    'id' => $member_details[0],
                    'name' => $member_details[1],
                    'sex' => $member_details[2],
                    'relationship' => $member_details[3],
                    'age' => $member_details[4],
                    'birthdate' => $member_details[5],
                    'civil_status' => $member_details[6],
                    'educational_attainment' => $member_details[7],
                    'occupation' => $member_details[8],
                    'monthly_income' => $member_details[9],
                    'solo_parent_reason' => $member_details[10],
                    'solo_parent_needs' => $member_details[11],
                    'emer_name' => $member_details[12],
                    'emer_relationship' => $member_details[13],
                    'emer_address' => $member_details[14],
                    'emer_contact_num' => $member_details[15],
                    'solo_parent_card_number' => $member_details[16],
                    'date_issuances' => $member_details[17],
                    'solo_parent_category' => $member_details[18],
                    'beneficiary_code' => $member_details[19],
                    
                );
            }

            // Add the parsed family members to the row data
            $row['family_members'] = $family_members_details;
        }
        
        // Convert the row to an object and store it in the array
        $p_order[] = (object) $row;
    }

    $stmt->close();

    return $p_order;
}


public function Joining_Generate_ID($id)
{
    $sql = "
        SELECT 
            solo_parent.id, 
            solo_parent.fullname,
            solo_parent.id_no,
            solo_parent.philsys_card_number,
            solo_parent.date_of_birth,
            solo_parent.age,
            solo_parent.place_of_birth,
            solo_parent.sex,
            solo_parent.address,
            solo_parent.civil_status,
            solo_parent.educational_attainment,
            solo_parent.occupation,
            solo_parent.religion,
            solo_parent.company_agency,
            solo_parent.monthly_income,
            solo_parent.employment_status,
            solo_parent.contact_number,
            solo_parent.email_address,
            solo_parent.pantawid_beneficiary,
            solo_parent.indigenous_person,
            solo_parent.are_you_a_migrant_worker,
            solo_parent.lgbtq,
            familymembers.user_id,
            familymembers.name,
            familymembers.sex AS family_member_sex,
            familymembers.relationship,
            familymembers.age AS family_member_age,
            familymembers.birthdate AS family_member_birthdate,
            familymembers.solo_parent_category,
            familymembers.beneficiary_code,
            familymembers.name,
            familymembers.relationship,
            familymembers.birthdate,
            familymembers.emer_name,
            familymembers.emer_address,
            familymembers.emer_contact_num,
            familymembers.age
        FROM 
            solo_parent
        LEFT JOIN 
            familymembers ON familymembers.user_id = solo_parent.id
        WHERE 
            solo_parent.id = ?
    ";

    // Prepare the SQL statement
    $stmt = $this->conn->prepare($sql);
    if ($stmt === false) {
        die('MySQL prepare error: ' . $this->conn->error);
    }

    // Bind the parameter for the query
    $stmt->bind_param("i", $id);
    
    // Execute the statement
    if (!$stmt->execute()) {
        die('Execute error: ' . $stmt->error);
    }
    
    // Get the result of the query
    $result = $stmt->get_result();
    $p_order = array();

    // Fetch the result
    while ($row = $result->fetch_assoc()) {
        $p_order[] = $row;
    }

    // Return the results (optional, depending on your application)
    return $p_order;
}
public function updateStatus($id, $status) {
    $stmt = $this->conn->prepare("UPDATE solo_parent SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
}
public function getConnection() {
    return $this->conn;
}
}

?>
