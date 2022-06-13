/**
 *   @file Sponsor
 *   @description Sponsors js class
 *   @version 1.0.0
 *   @author Rubén Torres <rtorresgutierrez.guadalupe@alumnado.fundacionloyola.net>
 *   @author Diego Carrión <dcarrionrodriguez.guadalupe@alumnado.fundacionloyola.net>
 *   @license GPL-3.0-or-later
 */
'use strict'

import * as FilePond from 'filepond';

export class Sponsor {

    constructor() {
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="image"]');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
    }

}
let sponsor = new Sponsor();
