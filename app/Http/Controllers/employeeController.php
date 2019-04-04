<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEmployee(Request $request)
    {

      $parameters = $request->except(['_token']);
      extract($parameters);

          $employ = new Employee();

          $date = new \DateTime(null);
          $employ->nom = $nom;
          $employ->prenom = $prenom;
          $employ->tel1 = $tel1;
          $employ->tel2 = $tel2;
          $employ->poste = $poste;
          $employ->email = $email;

          $employ->adresse = $adresse;
          $employ->login = $login;
          $employ->password = $password;
          $employ->whatsapp = $whatsapp;

        if($employ->save())
        {


        $status = 'success';
        $message = 'employees saved!';
        $data = ['nom' => $nom, 'prenom' => $prenom, 'tel1' => $tel1,  'tel2' => $tel2, 'adresse' => $adresse, 'login' => $login, 'password' => $password,  'poste' => $poste, 'whatsapp' => $whatsapp];

        $datas = ['status' => $status, 'message' => $message, 'data' => $data];

          return json_encode($datas);
          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $parameters = $request->except(['_token']);
          extract($parameters);

          $user = new User();
      $date = new \DateTime(null);

          $employ->nom = $nom;
          $employ->prenom = $prenom;
          $employ->addresse = $addresse;
          $employ->tel = $tel;
          $employ->email = $email;
          $employ->poste = $poste;
          $employ->whatsapp = $whatsapp;
          $employ->login = $login;
          $employ->password = bcrypt($password);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
