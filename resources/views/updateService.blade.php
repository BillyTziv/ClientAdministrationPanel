@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row"  >
            <div class="col-md-12">
            
                <div class="section-area">
                    <!-- Section heading with the bottom line divider -->
                    <div class="section-heading">
                        <h1>Ενημέρωση Υπηρεσίας</h1>
                        <div class="clientUpdateTitleDivider"></div>
                    </div>

                    <!-- Check the session status -->
                    <div class="section-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        

                        <form class="client-form" action="{{URL::to('/updateServiceData')}}" method="POST">
                            {{csrf_field()}}

                            <table class="form-section" style="width:100%;">
                                <tr>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="client_id" value="{{$client_id}}">
                                        <i class="fa fa-id-card fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Πελάτης:</span></i>
                                    </div></td>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="company_id" value="{{$company_id}}" placeholder="Πληκτρολογήσε το όνομα...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Επιχείρηση:</span></i>
                                    </div></td>
                                    <td>  <div class="inputWithIcon">
                                        <input type="text" name="name" value="{{$name}}" placeholder="Πληκτρολογήσε το επώνυμο...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Περιγραφή:</span></i>
                                    </div></td>

                                   
                                </tr>
                                <tr>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="type" value="{{$type}}" placeholder="Πληκτρολογήσε το κυρίως e-mail...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Τύπος:</span></i>
                                    </div></td>
                                    <td><div class="inputWithIcon">
                                        <input type="text" name="renew_date" value="{{$renew_date}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Ημερομηνία:</span></i>
                                    </div></td>
                                    <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="total_cost" value="{{$total_cost}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Σύνολο:</span></i>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="balance" value="{{$balance}}" placeholder="Πληκτρολογήσε το κυρίως e-mail...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Υπόλοιπο:</span></i>
                                    </div></td>
                                    <td><div class="inputWithIcon">
                                        <input type="text" name="deposit" value="{{$deposit}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Προ/βολή:</span></i>
                                    </div></td>
                                    <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="maintenance_cost" value="{{$maintenance_cost}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Συντήρηση:</span></i>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <div class="inputWithIcon">
                                        <input type="text" name="comments" value="{{$comments}}" placeholder="Πληκτρολογήσε το κυρίως e-mail...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Σχόλια:</span></i>
                                    </div></td>
                                    
                                </tr>
                            </table>
                            <input type="hidden" name="token" value="">
                            <input type="hidden" name="sel" value="{{$sel}}">

                            <table style="width: 400px; height: 50px; margin: auto;">
                                <tr>
                                    <td style="width: 225px;">
                                        <a href="{{URL::to('/home')}}" style="margin:auto; display:block;" class="homeButton">Πισω</a>
                                    </td>
                                    <td style="width: 225px;">
                                        <button style="margin:auto; display:block;" type="submit" class="submitButton" name="button">Ενημερωση</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div> <!-- End of section-body -->
                </div> <!-- End of section-area -->
        </div> <!-- End of col-md-6 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection