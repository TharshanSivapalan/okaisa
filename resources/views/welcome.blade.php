@extends('layouts.app')

@section('content')
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
    <div class="gtco-section border-bottom">
        <div class="gtco-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 animate-box text-center">
                        <div class="col-md-6 col-md-offset-3">
                            <h3 class="style_text">Un probleme? Une suggestion? Contacter-nous!</h3>
                        </div>
                        <form action="#">

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="email">Email</label>
                                    <input type="text" id="email" class="form-control" placeholder="Adresse email*">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="subject">Subject</label>
                                    <input type="text" id="subject" class="form-control" placeholder="Object (facultatif)">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <label class="sr-only" for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Votre message"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Valider" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
