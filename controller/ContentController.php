<?php
require(ROOT . "model/MainModel.php");

//Load Homepage
function index()
{
    $Horses = GetAllHorses();
    render('Content/Home/index', ['Horse' => $Horses]);
}

//Show Details of each horse.
function HorseDetails($id)
{
    $Horse = GetHorse($id);
    render('Content/Horse_information/Details', ['Horse' => $Horse]);
}

//Show user their reservations.
function ShowReservations(){
    $Reservations = GetAllReservations();
    render('Content/Reservation_details/Reservations', ['Reservations' => $Reservations]);
}

function ReservationPage($id)
{
    $Horse = GetHorse($id);
    render('Content/Create/Reservation', ['Horse' => $Horse]);
}


function ReservationsDetails($id)
{
    $Horse = GetHorse($id);
    $data = (array) null;
    $err = (array) null;
    if(isset($_POST['create_reservation'])){
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
            //Create insert functionality.
            $insertData = InsertReservation($data);
            render('Content/Reservation_detailsReservation_Information', ['data' => $data, 'reservation_data' => $insertData]);
        }
    }
}





//Go to edit page for reservation details.
function UpdateReservation($id)
{
    $data = GetReservation($id);
    render('Content/Edit/Edit_reservation', ['Data' => $data]);
}









//User handling

function Registration(){
    render('Handle_User/Reg');
}


function Login(){
    render('Handle_User/Login');
}

function Logout(){
    render('Handle_User/Logout');
}