
@extends('template.layout')
    
    @section('content')
   @include('template.header')


        <div class="section full mt-2">
            <div class="row" style="margin-top:65px;">
                <div class="col">
                    <input type="hidden" name="lokasi" id="lokasi">
                    <div class="webcame"> </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button class="btn btn-primary btn-block" id="absensi"> <ion-icon name="camera-outline"></ion-icon> Absen Masuk</button>
                </div>
            </div>

            
            <div class="row">
                <div class="col mt-2">
                    <div id="map"></div>
                </div>
            </div>
            
            
                
            </div>

        </div>

        @endsection('content')

