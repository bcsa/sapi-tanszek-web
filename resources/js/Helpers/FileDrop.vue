<template>
    <div class="filedrop-wrapper">
        <div class="dropzone" id="dropzone-file-drop" ref="dropzone">
            <div class="cursor-pointer upload-file-wrapper" @click="clickedDropzone()">
                <v-btn class="cta">
                    <i class="fas fa-upload mr-2"></i> Browse
                </v-btn>
            </div>
        </div>
    </div>
</template>

<script>
import Dropzone from "dropzone";
import "dropzone/dist/basic.css";

export default {
    props: {
        csrf: {
            required: true
        }
    },
    mounted() {
        this.dropzone = new Dropzone('#dropzone-file-drop', {
            url: "http://localhost/admin/rendezvenyek",
            headers: {'X-CSRF-TOKEN': this.csrf},
            parallelUploads: 10,
            autoProcessQueue: false,
            uploadMultiple: true,
            addRemoveLinks: true,
            acceptedFiles: "image/*",
            maxFilesize: 50, // 50MB
            maxFiles: 10,

            init: () => {
                var myDropzone = this;

                document.getElementById("submit").addEventListener("click", function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.dropzone.processQueue();
                });
            },
        });

        console.log(this.dropzone)

        this.dropzone.on("sendingmultiple", (data, xhr, formData) => {
            // console.log(data, xhr, formData)
            // formData.append("firstname", jQuery("#firstname").val());
            // formData.append("lastname", jQuery("#lastname").val());
        });

        this.dropzone.on("processing", (file) => {
            // this.dropzone.options.url = file.s3.url;
        });

        this.dropzone.on("successmultiple", (file) => {

        });

        this.dropzone.on("error", (file) => {
            this.dropzone.removeFile(file);
        });
    },

    methods: {
        clickedDropzone() {
            document.getElementById('dropzone-file-drop').click();
        }
    },
};
</script>
