<template>
    <div class="container outer-wrapper calculator-wrapper-outer">
        <div class="col mb-5">
            <h1>
                Configurează-ți propriul <span class="underline">sistem fotovoltaic</span>
            </h1>
        </div>

        <div v-show="step === 1" id="step1" class="col step1-wrapper step-wrapper">
            <div class="row mb-5">
                <div class="col text-center text-md-left">
                    <span class="step-count-wrapper">PASUL 1</span>
                    <span class="step-title">Consum</span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-7 slider-outer-wrapper">
                    <div class="row">
                        <div class="col">
                            <div class="col price-slider-wrapper">
                                <p class="slider-title mb-5">
                                    Introduceți valoare medie a facturilor de energie lunare
                                </p>

                                <v-slider
                                    v-model="haviSzamla"
                                    hide-details
                                    max="1000"
                                    min="30"
                                    step="1"
                                    :thumb-size="64"
                                    thumb-label="always"
                                    color="#F5D04C"
                                    thumb-color="#F5D04C"
                                    track-color="#D6D6D6"
                                >
                                    <template v-slot:thumb-label="{ value }">
                                        {{ value }} RON
                                    </template>
                                </v-slider>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <span class="divider-text">sau</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="col consum-slider-wrapper">
                                <p class="slider-title mb-5">Introduceți valoarea consumului mediu lunar în kWh</p>

                                <v-slider
                                    v-model="haviKwh"
                                    hide-details
                                    max="625"
                                    min="25"
                                    :thumb-size="64"
                                    thumb-label="always"
                                    color="#F5D04C"
                                    thumb-color="#F5D04C"
                                    track-color="#D6D6D6"
                                >
                                    <template v-slot:thumb-label="{ value }">
                                        {{ value }} kWh
                                    </template>
                                </v-slider>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-5 details-wrapper">
                    <div class="lunar-wrapper">
                        Consum lunar: <span class="value-wrapper">{{ haviKwh }} kWh</span>
                    </div>
                    <div class="anual-wrapper">
                        Consum anual: <span class="value-wrapper">{{ haviKwh * 12 }} kWh</span>
                    </div>
                    <div class="info-box">
                        *Rezultatul corect al unui consum anual este un factor important în configurarea unui sistem
                        potrivit.
                    </div>
                    <v-checkbox
                        v-model="packageTypeCheckbox"
                        label="Sistem Trifazat"
                        :hide-details="true"
                        :readonly="trifazatRequired"
                        :disabled="trifazatRequired"
                    ></v-checkbox>
                </div>

                <v-col cols="12" class="text-center text-md-left p-relative">
                    <v-btn
                        class="next-btn text-none mt-5"
                        color="#F5D04C"
                        depressed
                        rounded
                        @click="showNextStep"
                    >
                        Pasul următor
                    </v-btn>
                </v-col>
            </div>
        </div>

        <div v-show="step === 2" id="step2" class="step2-wrapper step-wrapper">
            <div class="row">
                <div class="col text-center text-md-left">
                    <span class="step-count-wrapper">PASUL 2</span>
                    <span class="step-title">ACOPERIȘUL TĂU</span>
                </div>
            </div>

            <div class="row">
                <div class="col title-wrapper">
                    Cum este acoperișul dumneavoastră?
                </div>
            </div>

            <div class="row text-center acoperis">
                <div class="col text-center">
                    <img :src="ferdeTetoSrc" alt="acoperis" class="img img-fluid" @click="selectRoof(1)">
                    <p class="small">Acoperis inclinat</p>
                </div>
                <div class="col text-center">
                    <img :src="laposTetoSrc" alt="acoperis" class="img img-fluid" @click="selectRoof(2)">
                    <p class="small">Acoperis drept</p>
                </div>
                <div class="col text-center">
                    <img :src="szabadTetoSrc" alt="acoperis" class="img img-fluid" @click="selectRoof(3)">
                    <p class="small">Pe sol</p>
                </div>
            </div>

            <div class="row p-relative">
                <div class="col-12">
                    <span @click="showPrevStep" class="back">
                        <ion-icon name="chevron-back-outline"></ion-icon> Pasul anterior
                    </span>

                    <span class="next">
                        <ion-icon name="chevron-forward-outline" @click="showNextStep"></ion-icon>
                    </span>
                </div>
            </div>

        </div>

        <div v-show="step === 3" class="step3-wrapper step-wrapper">
            <div class="row">
                <div class="col text-center text-md-left">
                    <span class="step-count-wrapper">PASUL 2</span>
                    <span class="step-title">ACOPERIȘUL TĂU</span>
                </div>
            </div>

            <div class="row">
                <div class="col title-wrapper">
                    Cum este acoperișul tău?
                </div>
            </div>

            <div class="">
                <div class="">
                    <template v-if="selectedRoof == 1">
                        <div class="row acoperis">
                            <div class="col text-center">
                                <div
                                    :class="{'cserep_egetett_selected': selectedRoofType == 'cserep_egetett'}"
                                    class="cserep cserep_egetett"
                                    @click="selectedRoofType = 'cserep_egetett'">
                                </div>
                                <p class="small">Țiglă ceramica</p>
                            </div>
                            <div class="col text-center">
                                <div
                                    :class="{'cserep_beton_selected': selectedRoofType == 'cserep_beton'}"
                                    class="cserep cserep_beton"
                                    @click="selectedRoofType = 'cserep_beton'"></div>
                                <p class="small">Țiglă din beton</p>
                            </div>
                            <div class="col text-center">
                                <div
                                    :class="{'cserep_femlemez_selected': selectedRoofType == 'cserep_femlemez'}"
                                    class="cserep cserep_femlemez"
                                    @click="selectedRoofType = 'cserep_femlemez'"></div>
                                <p class="small">Tabla zincata</p>
                            </div>
                            <div class="col text-center">
                                <div
                                    :class="{'cserep_zsindely_selected': selectedRoofType == 'cserep_zsindely'}"
                                    class="cserep cserep_zsindely"
                                    @click="selectedRoofType = 'cserep_zsindely'"></div>
                                <p class="small">Şindrilă</p>
                            </div>
                            <div class="col text-center">
                                <div
                                    :class="{'cserep_pala_selected': selectedRoofType == 'cserep_pala'}"
                                    class="cserep cserep_pala"
                                    @click="selectedRoofType = 'cserep_pala'"></div>
                                <p class="small">Ardezie</p>
                            </div>
                        </div>
                    </template>

                    <template v-if="selectedRoof == 2">
                        <div
                            :class="{'napelem_kiemelt_selected': selectedRoofType == 'napelem_kiemelt'}"
                            class="napelem napelem_kiemelt"
                            @click="selectedRoofType = 'napelem_kiemelt'"
                        >
                            <div class="tetoText">KIEMELT</div>
                        </div>
                        <div
                            :class="{'napelem_deltaszarny_selected': selectedRoofType == 'napelem_deltaszarny'}"
                            class="napelem napelem_deltaszarny"
                            @click="selectedRoofType = 'napelem_deltaszarny'"
                        >
                            <div class="tetoText">DELTASZARNY</div>
                        </div>
                        <div
                            :class="{'napelem_sikbafektetett_selected': selectedRoofType == 'napelem_sikbafektetett'}"
                            class="napelem napelem_sikbafektetett"
                            @click="selectedRoofType = 'napelem_sikbafektetett'"
                        >
                            <div class="tetoText">SIKBA FEKTETETT</div>
                        </div>
                    </template>

                    <template v-if="selectedRoof == 3">
                        <p class="title mt-7">Selectati locatie</p>
                        <div class="text-center">
                            <div
                                :class="{'szabadonallo_selected': selectedRoofType == 'szabadonallo'}"
                                class="kocsibeallo_szabadonallo szabadonallo"
                                @click="selectedRoofType = 'szabadonallo'"
                            >
                                <div class="tetoText">SZABADON ALLO</div>
                            </div>
                            <div
                                :class="{'kocsibeallo_selected': selectedRoofType == 'kocsibeallo'}"
                                class="kocsibeallo_szabadonallo kocsibeallo"
                                @click="selectedRoofType = 'kocsibeallo'"
                            >
                                <div class="tetoText">KOCSIBEALLO</div>
                            </div>
                        </div>
                    </template>
                </div>

                <div class="row p-relative">
                    <div class="col-12">
                        <span class="back" @click="showPrevStep">
                            <ion-icon name="chevron-back-outline"></ion-icon> Pasul anterior
                        </span>

                        <span class="next">
                            <ion-icon name="chevron-forward-outline" @click="showNextStep"></ion-icon>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div v-show="(step === 4) && (selectedRoof === 1)" class="step4-wrapper step-wrapper">
            <div class="row">
                <div class="col text-center text-md-left">
                    <span class="step-count-wrapper">PASUL 2</span>
                    <span class="step-title">ACOPERIȘUL TĂU</span>
                </div>
            </div>

            <div class="row">
                <div class="col title-wrapper">
                    Care este orientarea acoperișului tău?
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="iranytu">
                        <div class="eszak pozicio_e_d iranytu_egtajak">N</div>
                        <div class="kelet pozicio iranytu_egtajak">E</div>
                        <div class="nyugat pozicio iranytu_egtajak">V</div>
                        <div class="del_kelet pozicio iranytu_egtajak">SE</div>
                        <div class="del_nyugat pozicio iranytu_egtajak">SV</div>
                        <div class="eszak_kelet pozicio iranytu_egtajak">NE</div>
                        <div class="eszak_nyugat pozicio iranytu_egtajak">NV</div>

                        <round-slider
                            id="iranytu"
                            v-model="tajolas"
                            :endAngle="0"
                            :handleSize="0"
                            :max="360"
                            :min="0"
                            :radius="meret"
                            :showTooltip="false"
                            :startAngle="+180"
                            :step="90"
                            :width="padding_meret"
                            circleShape="custom"
                            handleShape="square"
                            sliderType="min-range"
                        />

                        <div class="del pozicio_e_d iranytu_egtajak">S</div>
                    </div>
                </div>
            </div>

            <div class="row p-relative">
                <div class="col-12">
                    <span @click="showPrevStep" class="back">
                        <ion-icon name="chevron-back-outline"></ion-icon> Pasul anterior
                    </span>

                    <span class="next">
                        <ion-icon name="chevron-forward-outline" @click="showNextStep"></ion-icon>
                    </span>
                </div>
            </div>
        </div>

        <div v-show="(step === 5) && (selectedRoof === 1)" class="step5-wrapper step-wrapper">
            <div class="row">
                <div class="col text-center text-md-left">
                    <span class="step-count-wrapper">PASUL 2</span>
                    <span class="step-title">ACOPERIȘUL TĂU</span>
                </div>
            </div>

            <div class="row">
                <div class="col title-wrapper">
                    Folosește butonul galben pentru a regla înclinarea plafonului.

                    <p>
                        *Mărimea sistemului este determinată în mare măsură de unghiul de înclinare.
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div id="teto_dolese">
                        <img class="img img-fluid d-md-none small" src="/img/calc/teto_doles_55.jpg">

                        <round-slider
                            id="shape"
                            v-model="tetoDoles"
                            :endAngle="+40"
                            :handleSize="0"
                            :max="55"
                            :min="15"
                            :radius="260"
                            :showTooltip="true"
                            :editable-tooltip="false"
                            :startAngle="360"
                            :step="10"
                            :width="50"
                            circleShape="quarter-top-left"
                            handleShape="round"
                            sliderType="min-range"
                        />

                        <img class="img img-fluid d-none d-md-block" src="/img/calc/teto_doles_55.jpg">
                    </div>
                </div>
            </div>

            <div class="row p-relative" style="margin-top: 45px;">
                <div class="col-12">
                    <span class="back" @click="showPrevStep">
                        <ion-icon name="chevron-back-outline"></ion-icon> Pasul anterior
                    </span>

                    <span class="next">
                        <ion-icon name="chevron-forward-outline" @click="showNextStep"></ion-icon>
                    </span>
                </div>
            </div>
        </div>

        <div v-show="step === 6" class="step-wrapper step6-wrapper">
            <div class="row">
                <div class="col text-center text-md-left">
                    <span class="step-count-wrapper">PASUL 3</span>
                    <span class="step-title">LOCAȚIE</span>
                </div>
            </div>

            <div class="row">
                <div class="col title-wrapper">
                    Te rugăm să specifici locul de instalare.
                </div>
            </div>

            <v-row>
                <v-col cols="10" md="8" offset="1" offset-md="2" class="contact-form__wrapper mt-10 mb-10 mx-auto">
                    <v-form ref="locationForm" lazy-validation class="contact-form form-validate" @submit.prevent="getAddress">
                        <v-row class="row">
                            <v-col cols="12" md="6" class="mb-3">
                                <div class="form-group">
                                    <v-text-field
                                        v-model="city"
                                        placeholder="Oraș"
                                        required
                                        :rules="[rules.required]"
                                    >
                                    </v-text-field>
                                </div>
                            </v-col>

                            <v-col cols="12" md="6" class="mb-3">
                                <div class="form-group">
                                    <v-text-field
                                        v-model="street"
                                        placeholder="Stradă"
                                        required
                                        :rules="[rules.required]"
                                    >
                                    </v-text-field>
                                </div>
                            </v-col>
                        </v-row>
                        <div class="row">
                            <v-col cols="12" md="6" class="mb-3">
                                <div class="form-group">
                                    <v-text-field
                                        v-model="streetNr"
                                        placeholder="Număr"
                                        required
                                        :rules="[rules.required]"
                                    >
                                    </v-text-field>
                                </div>
                            </v-col>

                            <v-col cols="12" md="6" class="mb-3">
                                <div class="form-group">
                                    <v-text-field
                                        v-model="zip"
                                        placeholder="Cod poștal"
                                        required
                                        :rules="[rules.required, rules.min6]"
                                        type="number"
                                    >
                                    </v-text-field>
                                    <a href="https://www.coduripostale.ro/" target="_blank" class="x-small">
                                        Caută cod poștal aici
                                    </a>
                                </div>
                            </v-col>

                            <v-col cols="12" class="text-center d-block d-md-none">
                                <v-btn
                                    class="next-btn"
                                    color="#F5D04C"
                                    depressed
                                    rounded
                                    @click="$refs.submitform.click()"
                                >
                                    Arată pe hartă
                                </v-btn>
                            </v-col>
                        </div>

                        <input type="submit" ref="submitform" hidden class="d-none">
                    </v-form>
                </v-col>
            </v-row>

            <div class="row p-relative">
                <div class="col-12">
                    <span class="back" @click="showPrevStep">
                        <ion-icon name="chevron-back-outline"></ion-icon> Pasul anterior
                    </span>

                    <v-btn
                        class="next-btn d-none d-md-block"
                        color="#F5D04C"
                        depressed
                        rounded
                        @click="$refs.submitform.click()"
                    >
                        Arată pe hartă
                    </v-btn>
                </div>
            </div>
        </div>

        <div v-show="step === 7" class="step-wrapper step7-wrapper">
            <div class="row">
                <div class="col text-center text-md-left">
                    <span class="step-count-wrapper">PASUL 3</span>
                    <span class="step-title">LOCAȚIE</span>
                </div>
            </div>

            <div class="row">
                <div class="col title-wrapper">
                    <template v-if="addressFound">
                        Marchează acoperișul pe hartă.

                        <p>
                            Cu ajutorul cercului galben, selectează clădirea în care panoul solar trebuie amplasat.
                        </p>
                    </template>
                    <template v-else>
                        Adresa nu a fost gasita!

                        <p>
                            Cauta manual si cu ajutorul cercului galben, selectează clădirea în care panoul solar trebuie amplasat.
                        </p>
                    </template>
                </div>
            </div>

            <div class="row">
                <div class="col-10 offset-1">
                    <gmap-map
                        ref="map"
                        :center="center"
                        :zoom="18"
                        map-type-id="satellite"
                        style="width:100%;  height: 350px;">
                        <gmap-marker
                            v-for="(gmp, index) in locations"
                            :key="index"
                            :position="gmp"
                            @click="center = gmp"
                        ></gmap-marker>
                    </gmap-map>
                </div>
            </div>

            <div class="row p-relative">
                <div class="col-12">
                    <span @click="showPrevStep" class="back">
                        <ion-icon name="chevron-back-outline"></ion-icon> Pasul anterior
                    </span>

                    <span class="next">
                        <ion-icon name="chevron-forward-outline" @click="showNextStep"></ion-icon>
                    </span>
                </div>
            </div>
        </div>

        <div v-show="false" class="step-wrapper step8-wrapper">
            <div class="row">
                <div class="col text-center text-md-left">
                    <span class="step-count-wrapper">PASUL 4</span>
                    <span class="step-title">DETALII</span>
                </div>
            </div>

            <div class="row">
                <div class="col title-wrapper">
                    Completează datele pentru o ofertă personalizată
                </div>
            </div>

            <v-row>
                <v-col cols="10" md="8" offset="1" offset-md="2" class="contact-form__wrapper mt-10 mb-10 mx-auto">
                    <v-form ref="detailsForm" lazy-validation class="contact-form form-validate" @submit.prevent="saveDetails">
                        <v-row class="row">
                            <v-col cols="12" md="6" class="mb-3">
                                <div class="form-group">
                                    <v-text-field
                                        v-model="nume"
                                        placeholder="Nume"
                                        required
                                        :rules="[rules.required]"
                                    >
                                    </v-text-field>
                                </div>
                            </v-col>

                            <v-col cols="12" md="6" class="mb-3">
                                <div class="form-group">
                                    <v-text-field
                                        v-model="prenume"
                                        placeholder="Prenume"
                                        required
                                        :rules="[rules.required]"
                                    >
                                    </v-text-field>
                                </div>
                            </v-col>
                        </v-row>
                        <div class="row">
                            <v-col cols="12" md="6" class="mb-3">
                                <div class="form-group">
                                    <v-text-field
                                        v-model="email"
                                        placeholder="Email"
                                        required
                                        type="email"
                                        :rules="[rules.required, rules.email]"
                                    >
                                    </v-text-field>
                                </div>
                            </v-col>

                            <v-col cols="12" md="6" class="mb-3">
                                <div class="form-group">
                                    <v-text-field
                                        v-model="phone"
                                        placeholder="Telefon"
                                        required
                                        :rules="[rules.required, rules.min10]"
                                        type="number"
                                    >
                                    </v-text-field>
                                </div>
                            </v-col>

                            <v-col cols="12">
                                <div class="form-group">
                                    <v-checkbox
                                        v-model="gdpr"
                                        required
                                        :rules="[rules.required]"
                                        label="Sunt de acord ca datele mele personale să fie prelucrate, în conformitate cu prevederile Regulamentului UE 679/2016 (GDPR)*"
                                    >
                                    </v-checkbox>
                                </div>
                            </v-col>

                            <v-col cols="12" class="text-center d-block d-md-none">
                                <v-btn
                                    class="next-btn"
                                    color="#F5D04C"
                                    depressed
                                    rounded
                                    @click="$refs.submitdetailsform.click()"
                                >
                                    Generează rezultat
                                </v-btn>
                            </v-col>
                        </div>

                        <input type="submit" ref="submitdetailsform" hidden class="d-none">
                    </v-form>
                </v-col>
            </v-row>

            <div class="row p-relative">
                <div class="col-12">
                    <span @click="showPrevStep" class="back">
                        <ion-icon name="chevron-back-outline"></ion-icon> Pasul anterior
                    </span>

                    <v-btn
                        class="next-btn d-none d-md-block"
                        color="#F5D04C"
                        depressed
                        rounded
                        @click="$refs.submitdetailsform.click()"
                    >
                        Generează rezultat
                    </v-btn>
                </div>
            </div>
        </div>

        <div v-show="(step === 8) && offerNapelemSzam" class="step-wrapper step8-wrapper text-center">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="img-calc-wrapper">
                        <div class="calculator__results__value calculator__results__value--co d-none d-sm-block">
                            <span class="co-kg">
                                {{ co2Megtakaritas }} kg
                            </span>
                            economii anuale de CO2
                        </div>

                        <div class="calculator__results__value calculator__results__value--felulet">
                            <span>{{ (napelemekSzama * napelemNegyzetmeter).toFixed(1) }} m2</span>
                            suprafața necesară a acoperișului
                        </div>

                        <div class="calculator__results__value calculator__results__value--darab">
                            <span>{{ offerNapelemSzam }} buc</span>
                            panou solar
                        </div>
                        <div class="calculator__results__value calculator__results__value--co d-block d-sm-none">
                                <span class="co-kg">
                                    {{ co2Megtakaritas }} kg
                                </span>
                            economii anuale de CO2
                        </div>
                        <div class="calculator__results__value calculator__results__value--eves">
                            <span>{{ (haviKwh * 12).toFixed(0) }} kWh</span>
                            producția netă anuală de energie
                        </div>

                        <img alt="img-calc" class="img img-fluid img-cal" src="/img/calchouse.png">
                    </div>
                </div>
            </div>
        </div>

        <div v-show="step === 8" class="col offer-wrapper">
            <div class="row mb-5">
                <div class="col-12 col-md-8 produse-recomandate">
                    <h2 class="pl-5">
                        Produse recomandate pentru tine
                    </h2>
                </div>
            </div>
            <div class="row justify-space-between">
                <div class="col-12 col-md-6 mb-3" v-for="offer in offers">
                    <div @click="goToUrl(offer.Url)" class="offer-inner-wrapper">
                        <img class="img img-fluid" width="100%" src="https://fomcosolar.s3.eu-central-1.amazonaws.com/20220628_ON_GRID_002_3bb0ca0c0d.png">

                        <h4 v-html="offer.Name">
                        </h4>

                        <p v-html="offer.Description">
                        </p>

                        <span class="price">
                            {{ Number(offer.Price).toLocaleString('RO') }} RON
                        </span>

                        <div class="row">
                            <div class="col text-center">
                                <a :href="offer.Url" class="details" target="_blank">
                                    vezi detalii
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "SolarCalculator",

    data() {
        return {
            kwhPrice: 1.6,

            szamla: 600,
            kwh: 375,

            tajolas: 90,

            tetoDoles: 55,

            step: 1,

            ferdeTetoSrc: '/img/calc/teto_ferde_select.png',
            laposTetoSrc: '/img/calc/teto_lapos.png',
            szabadTetoSrc: '/img/calc/teto_szabadon.png',

            selectedRoof: 1,
            selectedRoofType: 'cserep_egetett',

            center: {
                lat: 46.5077093,
                lng: 24.5060987
            },
            locations: [],
            currentLocation: null,
            markersArray: [],
            selectedLocation: null,

            city: null,
            zip: null,
            street: null,
            streetNr: null,

            napelemWatt: 410,
            napelemSzel: 1840,
            napelemHossz: 1030,
            napelemNegyzetmeter: 1.9,

            gdpr: false,

            huaweiInverter: false,
            trifazat: false,

            coeff: {
                0: {
                    15: 85,
                    25: 84,
                    35: 79,
                    45: 74,
                    55: 72,
                },

                90: {
                    15: 91,
                    25: 92,
                    35: 94,
                    45: 92,
                    55: 91,
                },

                180: {
                    15: 93,
                    25: 96,
                    35: 100,
                    45: 98,
                    55: 97,
                },

                270: {
                    15: 91,
                    25: 92,
                    35: 94,
                    45: 92,
                    55: 91,
                },

                360: {
                    15: 85,
                    25: 84,
                    35: 79,
                    45: 74,
                    55: 72,
                }
            },

            packageType: 'mono',

            trifazatRequired: false,

            addressFound: false,

            rules: {
                required: value => !!value || 'Câmp Necesar',
                min6: value => (value && value.length >= 6 ) || 'Minim 6 caractere',
                min10: value => (value && value.length >= 10 ) || 'Minim 10 caractere',
                email: value => /.+@.+\..+/.test(value) || 'Adresa de e-mail trebuie să fie validă',
            },

            email: null,
            phone: null,
            nume: null,
            prenume: null,
        }
    },

    mounted() {
        window.addEventListener('resize', event => {
            this.resize()
        }, true)
    },

    computed: {
        offerNapelemSzam() {
            if (this.rendszerOffer) {
                return _.get(this.rendszerOffer.Kit_parts[0], 'Quantity', this.napelemekSzama)
            }

            return null
        },

        offers() {
            let offers = this.$root.packageData['on-grid'][this.packageType].filter(e => {
                return e.System_power >= this.napelemrendszerMeret
            })

            return offers.slice(0, 2)
        },

        rendszerOffer() {
            let rendszer = this.offers

            if (rendszer.length) {
                this.trifazatRequired = false
                return rendszer[0]
            } else {
                this.packageTypeCheckbox = true
                rendszer = this.$root.packageData['on-grid'][this.packageType].filter(e => {
                    return e.System_power >= this.napelemrendszerMeret
                })

                if (rendszer.length) {
                    this.trifazatRequired = true
                    return rendszer[0]
                } else {
                    return null
                }
            }
        },

        totalPrice() {
            let basePrice = this.rendszerOffer.Price

            if (this.huaweiInverter) {
                basePrice += 1500
            }

            if (this.trifazat) {
                basePrice += 1500
            }

            return basePrice
        },

        napelemrendszerMeret() {
            return ((this.napelemekSzama * this.napelemWatt) / 1000).toFixed(2)
        },

        co2Megtakaritas() {
            return Math.round(((this.haviKwh * 12) / 1000) * 544).toFixed(1)
        },

        napelemekSzama() {
            let meretNemKerekitve = (this.evesFogyasztas / 1150).toFixed(2)
            let napelemSzam = (meretNemKerekitve * 1000) / this.napelemWatt

            if (napelemSzam < 8) {
                napelemSzam = 8
            }

            return Math.ceil(napelemSzam)
        },

        evesFogyasztas() {
            let evesFogyasztas = this.haviKwh * 12

            let coeff = _.get(_.get(this.coeff, this.tajolas), this.tetoDoles)
            let surplus = 100 - coeff
            evesFogyasztas += (evesFogyasztas * surplus) / 100

            return evesFogyasztas
        },

        haviSzamla: {
            get() {
                return this.szamla
            },

            set(value) {
                this.szamla = value
                this.kwh = Math.round(value / this.kwhPrice)
            }
        },

        haviKwh: {
            get() {
                return this.kwh
            },

            set(value) {
                this.kwh = value
                this.szamla = (value * this.kwhPrice).toFixed(1)
            }
        },

        packageTypeCheckbox: {
            get() {
                return this.packageType !== 'mono'
            },

            set(value) {
                this.packageType = value ? 'tri' : 'mono'
            }
        },

        address() {
            return this.zip + ' ' + this.city + ', ' + this.street + ' ' + this.streetNr + '.'
        },

        meret() {
            let meret = Math.round(window.innerWidth * 0.7 / 2);
            return meret = meret > 200 ? 200 : meret;
        },

        padding_meret() {
            return Math.round(this.meret / 4)
        }
    },

    watch: {
        selectedRoof(val) {
            if (val == 1) {
                this.selectedRoofType = 'cserep_egetett'
            } else if (val == 2) {
                this.selectedRoofType = 'napelem_kiemelt'
            } else if (val == 3) {
                this.selectedRoofType = 'szabadonallo'
            }
        },

        tetoDoles(val) {
            if (val === 15) {
                $("#teto_dolese img").fadeOut("fast", function () {
                    $("#teto_dolese img").attr("src", "/img/calc/teto_doles_15.jpg");
                    $("#teto_dolese img").fadeIn("fast");
                });
            } else if (val === 25) {
                $("#teto_dolese img").fadeOut("fast", function () {
                    $("#teto_dolese img").attr("src", "/img/calc/teto_doles_25.jpg");
                    $("#teto_dolese img").fadeIn("fast");
                });
            } else if (val === 35) {
                $("#teto_dolese img").fadeOut("fast", function () {
                    $("#teto_dolese img").attr("src", "/img/calc/teto_doles_35.jpg");
                    $("#teto_dolese img").fadeIn("fast");
                });
            } else if (val === 45) {
                $("#teto_dolese img").fadeOut("fast", function () {
                    $("#teto_dolese img").attr("src", "/img/calc/teto_doles_45.jpg");
                    $("#teto_dolese img").fadeIn("fast");
                });
            } else if (val === 55) {
                $("#teto_dolese img").fadeOut(0, function () {
                    $("#teto_dolese img").attr("src", "/img/calc/teto_doles_55.jpg");
                    $("#teto_dolese img").fadeIn("slow");
                });
            }
        },

        tajolas(val) {
            let iranytuHaz = document.querySelector("#iranytu .rs-bg-color")
            if (val == 0) {
                iranytuHaz.style.webkitTransform = "rotate(-90deg)"
                iranytuHaz.style.transform = "rotate(-90deg)"
                //iranytuHaz.css("-ms-transform","rotate(-90deg)");

            } else if (val == 90) {
                iranytuHaz.style.webkitTransform = "rotate(-45deg)"
                iranytuHaz.transform = "rotate(-45deg)";
                //iranytuHaz.css("-ms-transform","rotate(-45deg)");

            } else if (val == 180) {
                iranytuHaz.style.webkitTransform = "rotate(0deg)"
                iranytuHaz.transform = "rotate(0deg)";
                //iranytuHaz.css("-ms-transform","rotate(0deg)");

            } else if (val == 270) {
                iranytuHaz.style.webkitTransform = "rotate(34deg)"
                iranytuHaz.transform = "rotate(45deg)";
                //iranytuHaz.css("-ms-transform","rotate(45deg)");
            } else if (val == 360) {
                iranytuHaz.style.webkitTransform = "rotate(90deg)"
                iranytuHaz.transform = "rotate(90deg)";
                //iranytuHaz.css("-ms-transform","rotate(90deg)");
            }
        }
    },

    methods: {
        goToUrl(url) {
            window.open(url, '_blank', 'noreferrer');
        },

        saveDetails() {
            // TODO: SAVE DETAILS

            if (!this.$refs.detailsForm.validate()) {
                return;
            }

            axios.post(route('store-offer'),
                {
                    'lastName': this.nume,
                    'firstName': this.prenume,
                    'email': this.email,
                    'phone': this.phone,
                    'gdpr': this.gdpr,
                    'city': this.city,
                    'street': this.street,
                    'streetNumber': this.streetNr,
                    'postcode': this.zip,
                    'offerPrice': this.totalPrice,
                    'roofType': this.selectedRoof,
                    'roofMaterial': this.selectedRoofType,
                    'roofOrientation': this.tajolas,
                    'roofGrade': this.tetoDoles,

                }).then((response) => {
                    console.log(response)
                if (response.data.success) {

                }

            }).catch((error) => {
                if (error.response) {

                }
            })

            this.showNextStep()
        },

        resize() {
            setTimeout(() => {
                let height = document.getElementsByClassName('calculator-wrapper-outer')[0].scrollHeight

                if (this.step === 9) {
                    height += 200
                }

                let message = { height: height };

                // window.top refers to parent window
                window.top.postMessage(message, "*");
            }, 200)
        },

        getAddress() {
            if (!this.$refs.locationForm.validate()) {
                return;
            }

            let geocoder = new google.maps.Geocoder()

            geocoder.geocode({'address': this.address}, (results, status) => {
                if (status === google.maps.GeocoderStatus.OK) {
                    this.addressFound = true
                    for (let i = 0; i < this.markersArray.length; i++) {
                        this.markersArray[i].setMap(null);
                    }

                    this.markersArray.length = 0;

                    this.center = results[0].geometry.location;
                    this.selectedLocation = this.center

                    this.$refs.map.$mapObject.setOptions({'scrollwheel': true});
                    this.$refs.map.$mapObject.setOptions({draggable: true});

                    let circleMarker = new google.maps.Circle({
                        strokeColor: '#ffA500',
                        strokeOpacity: 0.8,
                        strokeWeight: 5,
                        fillColor: '#fff',
                        fillOpacity: 0,
                        map: this.$refs.map.$mapObject,
                        center: results[0].geometry.location,
                        radius: 20,
                        draggable: true,
                        editable: false
                    });

                    this.markersArray.push(circleMarker);

                    google.maps.event.addListener(circleMarker, 'dragend', () => {
                        this.$refs.map.$mapObject.setCenter(circleMarker.center)
                        this.selectedLocation = circleMarker.center
                        console.log(this.selectedLocation)
                    })

                } else {
                    this.addressFound = false
                }
            })

            this.step++
        },

        showNextStep() {
            if (this.step === 2 && this.selectedRoof !== 1) {
                this.step = 6
            } else {
                this.step++
            }

            this.resize()
        },

        showPrevStep() {
            if (this.selectedRoof !== 1 && this.step >= 6) {
                this.step = 2
            } else {
                this.step--
            }
        },

        setTakaroPos() {
            let alul = document.querySelector('#takaro_alul')
            let posicio = this.getPosition('#shape')
            let top = posicio.top + 282
            let left = posicio.left - 9
            alul.style.setProperty('top', top + 'px')
            alul.style.setProperty('left', left + 'px')

            let felul = document.querySelector('#takaro_alul')
            top = posicio.top - 33
            left = posicio.left + 245
            felul.style.setProperty('top', top + 'px')
            felul.style.setProperty('left', left + 'px')
        },

        getPosition(elementID) {
            let element = document.querySelector(elementID);

            return {
                top: element.offsetTop,
                left: element.offsetLeft,
            };
        },

        selectRoof(value) {
            this.selectedRoof = value

            if (this.selectedRoof === 1) {
                this.ferdeTetoSrc = '/img/calc/teto_ferde_select.png'
                this.laposTetoSrc = '/img/calc/teto_lapos.png'
                this.szabadTetoSrc = '/img/calc/teto_szabadon.png'
            } else if (this.selectedRoof === 2) {
                this.ferdeTetoSrc = '/img/calc/teto_ferde.png'
                this.laposTetoSrc = '/img/calc/teto_lapos_select.png'
                this.szabadTetoSrc = '/img/calc/teto_szabadon.png'
            } else if (this.selectedRoof === 3) {
                this.ferdeTetoSrc = '/img/calc/teto_ferde.png'
                this.laposTetoSrc = '/img/calc/teto_lapos.png'
                this.szabadTetoSrc = '/img/calc/teto_szabadon_select.png'
            }
        }
    }

}
</script>
