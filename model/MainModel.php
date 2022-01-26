<?php 
	session_start(); 
	function getUserId($name){
		$conn = openDatabaseConnection(); 
		$stmt = $conn->prepare("SELECT id, username FROM `accounts`  where username =  :name");
		$stmt -> execute([
			':name' => $name
		]);

		$id = $stmt->fetch(PDO::FETCH_ASSOC);
		$conn = null;
		return $id['id'];

	}
    // Get every horse that exists in the Database:
    function GetAllHorses()
	{
		$conn = openDatabaseConnection(); 
		$stmt = $conn->prepare("SELECT * FROM horses");
		$stmt->execute();
		$data = $stmt->fetchAll();
		$conn = null;
		return $data;
    }

	function GetAllReservations()
	{
		$conn = openDatabaseConnection(); 
		$stmt = $conn->prepare("SELECT horses.img_path, accounts.username, reservations.id, reservations.riding, reservations.price, reservations.date_time_start, reservations.date_time_end, horses.name 
		FROM reservations 
		INNER JOIN accounts on reservations.reservee = accounts.id 
		INNER JOIN horses on reservations.horse = horses.id 
		WHERE accounts.id = :id");
		$stmt->execute([
			':id' => getUserId($_SESSION['user'])
		]);
		$data = $stmt->fetchAll();
		$conn = null;
		return $data;
	}

    function PrintDateDiffrence($start_date, $end_date)
	{
        $startDate = new DateTime($start_date);
        $endDate = new DateTime($end_date);
        $test = date_diff($startDate, $endDate);
        $minutes = $test->days * 24 * 60;
        $minutes += $test->h * 60;
        $minutes += $test->i;
        $totalPrice = floor($minutes/15 * 55);
        return $totalPrice;
    }


	function editReservation($data)
	{
		$conn = OpenDatabaseConnection();
		$stmt = $conn->prepare("UPDATE `reservations` 
		SET 
		`riding` = :riding ,
		`date_time_start` = :date_time_start,
		`date_time_end` = :date_time_end 
		WHERE id = :id");
		$stmt->execute([
			':riding' =>  ($data['reservee-horse-riding'] == "true" ? 1 : 0),
			':date_time_start' => date('y-m-d H:i:s', strtotime($data['starting_time'])),
			':date_time_end' => date('y-m-d H:i:s', strtotime($data['end_time'])),
			':id' => $data['reservation-id']
		]);
		}


	function Gethorse($id){
		$conn = openDatabaseConnection(); 
		$stmt = $conn->prepare("SELECT * FROM horses where id=:id");
		$stmt->execute(['id'=>$id]);
		$data = $stmt->fetch();
		$conn = null;
		return $data;
	}
	
	function GetHorseByName($name){
		$conn = openDatabaseConnection(); 
		$stmt = $conn->prepare("SELECT id FROM horses where name=:name");
		$stmt -> execute([
			':name' => $name
		]);
		$id = $stmt->fetch();
		$conn = null;
		return $id['id'];
		
	}


	function InsertReservation($data){
		$conn = openDatabaseConnection(); 
		$stmt = $conn->prepare("INSERT INTO `reservations` (`reservee`,`price`, `horse`, `riding`, `date_time_start`, `date_time_end`) VALUES (:reservee, :total_price, :horse, :riding, :starting_date, :end_date)");
		$stmt->execute([
			':total_price' => PrintDateDiffrence($data['starting_time'], $data['end_time']),
			':reservee' => getUserId($data['reservee-name']),
			':horse' => GetHorseByName($data['reservee-horse']),
			':riding' => ($data['reservee-horse-riding'] == "true" ? 1 : 0),
			':starting_date' =>  date('y-m-d H:i:s', strtotime($data['starting_time'])),
			':end_date' => date('y-m-d H:i:s', strtotime($data['end_time']))
		]);

		//Get last inserted row to show information of data thrown at user.
		$reserverationkey = $conn->lastInsertId();
		$stmt = $conn->prepare("SELECT * from reservations WHERE id=:id");
		$stmt->execute(['id'=> $reserverationkey]);
		$data = $stmt->fetch();
		$conn = null;
		return $data;
		
	}


	function GetReservation($id){
		$conn = openDatabaseConnection(); 
		$stmt = $conn->prepare("SELECT 
		reservations.id as reservationID, 
		reservations.date_time_start, 
		reservations.date_time_end, 
		reservations.riding, horses.name 
		FROM reservations 
		INNER JOIN horses 
		on reservations.horse = horses.id;  
		WHERE reservations.id = :id");
		$stmt->execute([':id'=> $id]);
		$data = $stmt->fetch();
		$conn = null;
		return $data;
	}



	if(isset($_POST['edit_reservation'])){
		$data = (array) null;
		$err = (array) null;
		foreach($_POST as $field => $value){
            if(!empty($_POST[$field])){
                $data[$field] = $value;
            }else{
                $err[$field] = "Invalid input!";
            }
        }
        if(!empty($err)){
            render('Content/Create/Reservation', ['Error' => $err, 'Horse' => $Horse]);
        }else{
            $editData = editReservation($data);
            render('Content/Reservation_details/Reservation_change', ['data' => $data, 'reservation_data']);
        }
	}











	//USER INTERACTION

	//Handle registration
	if(isset($_POST['reg_submit'])){
			$conn = openDatabaseConnection();

			$user = $_POST['username'];
			$email = $_POST['email'];
			$pass = $_POST['password'];

			$pass = password_hash($pass, PASSWORD_BCRYPT, ["cost" => 12]);

			//What if user exists? 
			$stmt = "SELECT count(username) as num FROM `accounts` WHERE username = :username";
			$stmt = $conn->prepare($stmt);
			$stmt->bindValue(':username', $user);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if($row['num'] > 0){
				echo "test";
			}else{
				$stmt = $conn->prepare("INSERT INTO `accounts` (`username`, `password`, `email`) VALUES (:username, :password, :email)");
				if($stmt->execute(
					[
						':username' => $user,
						':password' => $pass,
						':email' => $email,
					]
						)){
					
				}
			}
	}

	//Handle login
	if(isset($_POST['login_submit'])){
			$conn = openDataBaseConnection();

			$username = !empty($_POST['username']) ? trim($_POST['username']) : null;
			$passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

			$stmt = "SELECT id, username, password FROM `accounts` WHERE username = :username";
			$stmt = $conn->prepare($stmt);
			$stmt->bindValue('username', $username);
			$stmt->execute();
			$user = $stmt->fetch(PDO::FETCH_ASSOC);

			if($user === false){
				echo '<script> alert("Invalid account information")</script>';
			}else{
				$validpassword = password_verify($passwordAttempt, $user['password']);
				if($validpassword){
					$_SESSION['user'] = $username;
					
					header("Location:index");
					
				}else{
					echo '<script> alert("Invalid account information")</script>';
				}
			}
		}




?>