@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading">
                    <h1>Εισαγωγή Επιχείρησης</h1>
                    <div class="section-heading-divider"></div>
                </div>

                <!-- Check the session status -->
                <div class="section-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="client-form" action="{{URL::to('/insertNewCompany')}}" method="POST">
                        {{csrf_field()}}

                        <h3 class="subtitle fancy" id="firstSubTitle"><span>Επιλογή Πελάτη</span> </h3>
                        
                        <div style="width: 180px; height: 100px; margin-left: auto; margin-right: auto;" >
                        <p style="color: white;">Επιλέξτε τον πελάτη για τον οποίο θέλετε να προσθέσετε μια επιχείρηση.</p>
                        <select  name="clientSelected">
                        <?php
                            $clientsDataset = DB::select('select * from clients');
                        
                            foreach ($clientsDataset as $client) {
                                echo "<option value=\"" . $client->clientId . "\">" . $client->clientFirstname . " " . $client->clientSurname . "</option>";
                            }
                        ?>
                        </select>
                        </div>
                                   
                        <h3 class="subtitle fancy"><span>Στοιχεία Επιχείρησης</span> </h3>
                        <table class="form-section" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyName" placeholder="Επωνυμία επιχείρησης...">
                                        <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Επωνυμία:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyType" placeholder="Τύπος επιχείρησης...">
                                        <i class="fa fa-map-marker fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Τύπος:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyPhone" placeholder="Σταθερό τηλέφωνο της επιχείρησης...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Τηλέφωνο:</span></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyEmail" placeholder="Επαγγελματικό email της επιχείρησης (@codex.gr)...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Email:</span></i>
                                    </div></td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyAddress" placeholder="Διεύθυνση της επιχείρησης...">
                                        <i class="fa fa-globe fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Διεύθυνση:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="websiteURL" placeholder="Ιστοσελίδα της επιχείρησης...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Ιστοσελίδα:</span></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>     
                                    <div class="inputWithIcon">
                                        <input type="text" name="comments" placeholder="Πληκτρολογήστε σχόλια...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Σχόλια:</span></i>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="token" value="">
                        <button type="submit" class="submitButton" name="button">Προσθηκη Επιχείρησης</button></br></br>
                    </form>
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection