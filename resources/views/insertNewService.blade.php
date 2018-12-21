@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading">
                    <h1>Εισαγωγή Υπηρεσίας</h1>
                    <div class="section-heading-divider"></div>
                </div>

                <!-- Check the session status -->
                <div class="section-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="client-form" action="{{URL::to('/insertNewService')}}" method="POST">
                        {{csrf_field()}}
                        <div style="width: 600px; height: 70px; margin-left: auto; margin-right: auto;" >
                            <table>
                                <tr>
                                    <td>
                                        <h3 style="padding-right: 25px; padding-top: 10px; text-align: right; " id="firstSubTitle">Η νέα υπηρεσία αφορά τον πελάτη </h3>
                                    </td>
                                    <td>
                                        <select style="width: 200px; height: 32px; font-family: Arial; font-size: 14px; border-radius: 3px;"  name="clientSelected">
                                            <?php
                                                $clientsDataset = DB::select('select * from clients');
                                            
                                                foreach ($clientsDataset as $client) {
                                                    echo "<option value=\"" . $client->clientId . "\">" . $client->clientFirstname . " " . $client->clientSurname . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 style="padding-right: 25px; padding-top: 10px; text-align: right;" id="firstSubTitle">και θα ανήκει στην επιχείρηση </h3>
                                    </td>
                                    <td>
                                        <select style="width: 200px; height: 32px; font-family: Arial; font-size: 14px; border-radius: 3px;" name="companySelected">
                                            <?php
                                                $companiesDataset = DB::select('select * from companies');
                                            
                                                foreach ($companiesDataset as $company) {
                                                    echo "<option value=\"" . $company->id . "\">" . $company->name . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div> </br></br>

                                   
                        <!-- <h3 class="subtitle fancy"><span>Στοιχεία Υπηρεσίας</span> </h3>-->
                        <table class="form-section" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="serviceName" placeholder="Πληκτρολόγησε μια περιγραφή για την υπηρεσία...">
                                        <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Περιγραφή:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="serviceType" placeholder="Πληκτρολόγησε τον τύπο της υπηρεσίας...">
                                        <i class="fa fa-map-marker fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Τύπος:</span></i>
                                    </div>
                                </td>
                             
                                <td>
                                
                                    <div class="inputWithIcon">
                                        <label id="dateRenew">Ανανέωση Συνδομής:</label>
                                        <input type="date" name="renewDate">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="totalCost" placeholder="Πληκτρολόγησε το συνολικό κόστος της υπηρεσίας...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Συνολο:</span></i>
                                    </div></td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="balance" placeholder="Πληκτρολόγησε το υπόλοιπο ποσό...">
                                        <i class="fa fa-globe fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Υπόλοιπο:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="deposit" placeholder="Πληκτρολόγησε το ποσό της προκαταβολής...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Προ/βολη:</span></i>
                                    </div>
                                </td>
                               
                               
                            </tr>
                            <tr>
                            <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="comments" placeholder="Πληκτρολόγησε αν υπάρχουν καθόλου σχόλια ...">
                                        <i class="fa fa-globe fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Σχολια:</span></i>
                                    </div>
                                </td>
                                <td>     
                                    <div class="inputWithIcon">
                                        <input type="text" name="maintenanceCost" placeholder="Πληκτρολόγησε το ποσό της ετήσιας συντήρησης...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Συντήρηση:</span></i>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="token" value="">
                        <table style="width: 400px; height: 50px; margin: auto;">
                            <tr>
                                <td style="width: 225px;">
                                    <a href="{{URL::to('/home')}}" style="margin:auto; display:block;" class="homeButton">Πισω</a>
                                </td>
                                <td style="width: 225px;">
                                    <button style="margin:auto; display:block;" type="submit" class="submitButton" name="button">Προσθηκη</button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection