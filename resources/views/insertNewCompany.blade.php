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
                        <div style="width: 600px; height: 70px; margin-left: auto; margin-right: auto;" >
                            <table>
                                <tr>
                                    <td>
                                        <h3 style="padding-right: 25px; padding-top: 10px; " id="firstSubTitle">Η νέα επιχείρηση θα ανήκει στον πελάτη </h3>
                                    </td>
                                    <td>
                                    <select style="width: 200px; height: 32px; font-family: Arial; font-size: 14px; border-radius: 3px;" name="clientSelected">
                                        <?php
                                            $clientsDataset = DB::select('select * from clients');
                                        
                                            foreach ($clientsDataset as $client) {
                                                echo "<option style=\"height: 32px; font-family: Arial; font-size: 14px;\"  value=\"" . $client->clientId . "\">" . $client->clientFirstname . " " . $client->clientSurname . "</option>";
                                            }
                                        ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                                   
                        <!-- <h3 class="subtitle fancy"><span>Στοιχεία Επιχείρησης</span> </h3>-->
                        <table class="form-section" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyName" placeholder="Πληκτρολόγησε την επωνυμία της νέας επιχείρησης...">
                                        <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Επωνυμία:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyType" placeholder="Πληκτρολόγησε τον τύπο της νέας επιχείρησης...">
                                        <i class="fa fa-map-marker fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Τύπος:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyPhone" placeholder="Πληκτρολόγησε το σταθερό τηλέφωνο...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Τηλέφωνο:</span></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyEmail" placeholder="Πληκτρολόγησε το επαγγελματικό email (@domain)...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Email:</span></i>
                                    </div></td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyAddress" placeholder="Πληκτρολόγησε την διεύθυνση της επιχείρησης...">
                                        <i class="fa fa-globe fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Διεύθυνση:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="websiteURL" placeholder="Πληκτρολόγησε το url της ιστοσελίδας...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Ιστοσελίδα:</span></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>     
                                    <div class="inputWithIcon">
                                        <input type="text" name="comments" placeholder="Πληκτρολογήστε τυχόν σχόλια...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Σχόλια:</span></i>
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