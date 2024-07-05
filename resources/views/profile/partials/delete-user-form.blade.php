<section class="space-y-6 ">
    <header>
        <h2 class="mb-3 color-yellow font-archivo shadow-dark">
            {{ __('Elimina Account') }}
        </h2>

        <p class="mt-1 text-sm color-purple font-archivo">
            {{ __('Una volta eliminato il tuo account, tutte le sue risorse e i suoi dati verranno eliminati definitivamente. Prima di eliminare il tuo account, scarica tutti i dati o le informazioni che desideri conservare.') }}
        </p>
    </header>

    <!-- Modal trigger button -->
    <button type="button" class="btn btn-elimina-label font-archivo mt-3" data-bs-toggle="modal" data-bs-target="#delete-account">
        {{__('Elimina Account')}}
    </button>

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="delete-account" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="delete-account" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content border-0">
                <div class="modal-header bg-color-grey border-0">
                    <h3 class="modal-title font-archivo color-yellow shadow-dark" id="delete-account">Elimina Account</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-color-grey border-0">
                    <h2 class="text-lg font-medium color-purple font-archivo shadow-purple">
                        {{ __('Sei sicuro di voler eliminare il tuo account?') }}
                    </h2>
                    <p class="mt-1 text-sm color-purple font-archivo">
                        {{ __('Una volta eliminato il tuo account, tutte le sue risorse e i suoi dati verranno eliminati definitivamente. Inserisci la tua password per confermare che desideri eliminare definitivamente il tuo account.') }}
                    </p>
                </div>
                <div class="modal-footer bg-color-grey border-0">
                    <button type="button" class="btn btn-chiudi-account font-archivo" data-bs-dismiss="modal">Chiudi</button>

                    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')


                        <div class="input-group">

                            <input id="password" name="password" type="password" class="form-control input-todolist" placeholder="{{ __('Password') }}" />

                            @error('password')
                            <span class="invalid-feedback mt-2" role="alert">
                                <strong>{{ $errors->userDeletion->get('password')}}</strong>
                            </span>
                            @enderror



                            <button type="submit" class="btn btn-elimina-account font-archivo">
                                {{ __('Elimina Account') }}
                            </button>
                            <!--  -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>
