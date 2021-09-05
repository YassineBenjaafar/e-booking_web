<!DOCTYPE html>

<html>

<head>

    <title>Report</title>
    <style>
.body-main {
     background: #ffffff;
     border-bottom: 15px solid #1E1F23;
     border-top: 15px solid #1E1F23;
     margin-top: 30px;
     margin-bottom: 30px;
     padding: 40px 30px !important;
     position: relative;
     box-shadow: 0 1px 21px #808080;
     font-size: 10px
 }

 .main thead {
     background: #1E1F23;
     color: #fff
 }

 .img {
     height: 100px
 }

 h1 {
     text-align: center
 }
    </style>
 
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>

<body>
   

    <div class="container-lg">
        <div class="page-header">
            <h1>Rapport</h1>
        </div>
        <div class="container-lg">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 body-main">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 text-right">
                                <h4><strong>Hébergement <span style="color:#2f89fc">Vacances </span></strong></h4>
                                <p>61200 Maroc Oujda</p>
                                <p>+212 5 36 68 15 15</p>
                                <p>gh@email.com</p>
                            </div>
                        </div> <br />
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h2>RESERVATION N°</h2>
                            <h5>{{'M'.Auth::guard('client')->user()->salarie->matricule.'R'.$reservation->id}}</h5>
                            </div>
                        </div> <br />
                        <div>
                            <table class="table table-striped" style="margin-top: 200px">
                                <thead>
                                    <tr>
                                        <th>
                                            Ref
                                        </th>
                                        <th>
                                            type
                                        </th>
                                        <th>
                                            date d'arrivée
                                        </th>
                                        <th>
                                            date de sortie
                                        </th>
                                        <th>
                                            nuits
                                        </th>
                                        <th>
                                            prix par nuit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{'M'.Auth::guard('client')->user()->salarie->matricule.'R'.$reservation->id}}</td>
                                        <td>{{$reservation->maison->libelle}}</td> 
                                        <td>{{$reservation->date_debut}}</td>
                                        <td>{{$reservation->date_fin}}</td>
                                        <td>{{(strtotime($reservation->date_fin) - strtotime($reservation->date_debut))/86400}}</td>
                                        <td>{{$reservation->maison->prix_par_nuit}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="color: #F81D2D;">
                                <span class="text-right">
                                    <h4><strong>Total: {{$reservation->montant.' MAD'}}</strong></h4>
                                </span>
                            </div>
                        </div>
                        <div>
                            <div class="col-md-12">
                            <p><b>Date de création : </b> {{ $reservation->created_at}}</p> <br />
                                <p><b>Signature</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span>Notice : veuillez s'il vous plait présenter cet fiche de confirmation de votre reservation au responsable du lieu pour ....</span>
        </div>
       
    </div>

</body>

</html>


