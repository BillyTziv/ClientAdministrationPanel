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
                        <h3 class="subtitle fancy" id="firstSubTitle"><span>Επιλογή Πελάτη</span> </h3>
                        <p style="text-align:center; color: white;">Επιλέξτε τον πελάτη για τον οποίο θέλετε να προσθέσετε μια επιχείρηση.</p>
                        
                        <div style="width: 180px; height: 60px; margin-left: auto; margin-right: auto;" >
                        
                        <select  name="clientSelected">
                        <?php
                            $clientsDataset = DB::select('select * from clients');
                        
                            foreach ($clientsDataset as $client) {
                                echo "<option value=\"" . $client->clientId . "\">" . $client->clientFirstname . " " . $client->clientSurname . "</option>";
                            }
                        ?>
                        </select>
                        </div>
                        <h3 class="subtitle fancy" id="firstSubTitle"><span>Επιλογή Επιχείρησης</span> </h3>
                        <p style="text-align:center; color: white;">Επιλέξτε την επιχείρησης για την οποία θέλετε να προσθέσετε μια υπηρεσία.</p>

                        <div style="width: 180px; height: 30px; margin-left: auto; margin-right: auto;" >
                        <select  name="companySelected">
                        <?php
                            $companiesDataset = DB::select('select * from companies');
                        
                            foreach ($companiesDataset as $company) {
                                echo "<option value=\"" . $company->id . "\">" . $company->name . "</option>";
                            }
                        ?>
                        </select>
                        </div>
                                   
                        <h3 class="subtitle fancy"><span>Στοιχεία Υπηρεσίας</span> </h3>
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
                        <button type="submit" class="submitButton" name="button">Προσθηκη Υπηρεσίας</button></br></br>
                    </form>
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection