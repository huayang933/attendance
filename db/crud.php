<?php
    class crud{
        // private database object
        private $db;

        // constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        //function to insert a new record into the attendees database
        public function insertAttendees($fname, $lname, $dob, $email, $contact, $specialty, $avatar_path){
            try{
                // define sql statement to be executed
                $sql = "INSERT INTO attendees (firstname, lastname, dateofbirth, emailaddress, contactnumber, specialty_id, avatar_path) VALUES (:fname, :lname, :dob, :email, :contact, :specialty, :avatar_path)";
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                // bind all placeholders to the actual values
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                $stmt->bindparam(':avatar_path', $avatar_path);

                $stmt->execute();
                return true;
            }catch (PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function editAttendee($id, $fname, $lname, $dob, $email, $contact, $specialty){
            try{
                $sql = "UPDATE `attendees` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id";
                // prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);

                // bind all placeholders to the actual values
                $stmt->bindparam(':fname', $fname);
                $stmt->bindparam(':lname', $lname);
                $stmt->bindparam(':dob', $dob);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':contact', $contact);
                $stmt->bindparam(':specialty', $specialty);
                $stmt->bindparam(':id', $id);

                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
            
        }

        public function getAttendees(){
            try{
                $sql = "SELECT * FROM `attendees` a INNER JOIN specialities s ON a.specialty_id = s.specialty_id";
                $result = $this->db->query($sql);

                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeDetails($id){
            try{
                $sql = "SELECT * FROM attendees a INNER JOIN specialities s ON a.specialty_id = s.specialty_id WHERE a.attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getAttendeeSpeciality($id){
            try{
                $sql = "SELECT * FROM specialities WHERE specialty_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteAttendee($id){
            try{
                $sql = "DELETE FROM attendees WHERE attendee_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        public function getSpecialities(){
            try{
                $sql = "SELECT * FROM `specialities`";
                $result = $this->db->query($sql);

                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
    }

?>