<div>
    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M6 4h11a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-11a1 1 0 0 1 -1 -1v-14a1 1 0 0 1 1 -1m3 0v18" />
                    <line x1="13" y1="8" x2="15" y2="8" />
                    <line x1="13" y1="12" x2="15" y2="12" />
                </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">Artículo 14</h3>
                <div class="mt-2">
                    <h5 class="text-gray-900">Aceptación</h5>
                    <p class="text-justify text-sm text-gray-500">
                        Todos los participantes, por el hecho de inscribirse, reconocen que se encuentran en perfectas condiciones para la práctica deportiva,
                        y se comprometen a correr bajo su estricta responsabilidad. Además de aceptar el presente reglamento y la utilización informática, y con
                        el fin deportivo, de sus datos personales e imágenes dentro de la prueba mediante fotografías, vídeos, etc. En caso de duda o de surgir
                        alguna situación no reflejada en el mismo, se estará a lo que disponga el Comité Organizador.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:justify-center">
        <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cerrar</button>
    </div>
</div>
