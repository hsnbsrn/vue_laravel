
<template>
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center">
            Şirketler
            <button @click="clearCompanyandErrors()" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Şirket Ekle</button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">İsim</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="( company,index) in companies" v-bind:key="company.id">
                    <th scope="row">{{index+1}}</th>
                    <td>{{ company.name }}</td>
                    <td>
                        <a @click="editCompany(company)" data-bs-toggle="modal" data-bs-target="#exampleModal1"  class="btn btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                        </a>
                        <a @click="deleteCompany(company)"  class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                        </a>
                        <RouterLink :to="{name: 'customers', params:{id:company.id}}"> <a class="btn btn-sm btn-warning" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16">
                        <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/></svg>
                        </a></RouterLink>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Şirket Ekle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form @submit.prevent="storeCompany">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Şirket İsmi</label>
                        <input type="text" v-model="company.name" class="form-control" id="name">
                        <div v-if="errors.name" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.name[0]}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Şirket Güncelle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form @submit.prevent="updateCompany">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Şirket İsmi</label>
                        <input type="text" v-model="company.name" class="form-control" id="name">
                        <div v-if="errors.name" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.name[0]}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center">
           <button type="button" class="btn btn-info" v-on:click="isShow = !isShow" @click="getDeletedCompany()" >Arşivlenmiş Şirketleri Göster</button>
        </div>
        <div class="card-body" v-show="isShow" >
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">İsim</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="( company,index) in deleted_companies" v-bind:key="company.id">
                    <th scope="row">{{index+1}}</th>
                    <td>{{ company.name }}</td>
                    <td>
                        <a @click="restoreCompany(company)"    class="btn btn-sm btn-dark">Geri Yükle</a>
                        <a @click="forceDeleteCompany(company)"   class="btn btn-sm btn-danger">Tamamen Sil</a>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


  </template>



  <script>
  
    import axios from 'axios';
    import Swal from 'sweetalert2'
    export default {
    data() {
        return {
        success: false,
        company: {
            id:'',
            name:''
        },
        companies: [],
        deleted_companies: [],
        errors: [],
        isShow : false
        };
    },
    created() {
        this.getCompany();
        setInterval(()=>this.getCompany(),3000)
    },
    methods: {
        getCompany() {
            var url = "http://localhost:8000/api/companies";
            axios.get(url).then((response) => {
            this.companies = response.data;
            });
        },
        storeCompany() {
            var url = "http://localhost:8000/api/companies";
            axios.post(url, this.company).then(response => {
                this.success = response.data.success;
                this.getCompany()
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Şirket eklendi',
                    showConfirmButton: false,
                    timer: 1500
                })
                })
                .catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            });
        },
        error(field) {
            return _.head(field);
        },
        editCompany(company){
            
            this.company=company;
        },

        updateCompany(){
            var url = "http://localhost:8000/api/companies/"+this.company.id;
            axios.put(url, this.company).then(
                ({data})=>{
                    this.getCompany();
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Şirket güncellendi',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            ).catch(error => {
                if (error.response.status == 422) {
                    this.errors = error.response.data.errors;
                }
            });
        },

        deleteCompany(company) {
            Swal.fire({
                title: 'Emin Misin?',
                text: company.name+" İsimli Şirketi Silmek İstediğinize Emin Misin?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil',
                cancelButtonText: 'İptal',
                }).then((result) => {
                if (result.isConfirmed) {
                    var url = "http://localhost:8000/api/companies/"+company.id;
                    axios.delete(url);
                    this.getCompany();
                    this.getDeletedCompany()
                    Swal.fire(
                        'Silindi!',
                        'Şirket Silindi',
                        'success'
                    )
                }
            })
        },

        clearCompanyandErrors(){
            this.company.id=1
            this.company.name=''
            this.errors=[]
        },

        getDeletedCompany(){
            var url = "http://localhost:8000/api/deletedCompanies";
            axios.get(url).then((response) => {
            this.deleted_companies = response.data;
            });
        },

        restoreCompany(company){
            Swal.fire({
                title: 'Emin Misin?',
                text: "Şirketi Geri Yükelemek İstediğinize Emin Misin?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Geri Yükle',
                cancelButtonText: 'İptal',
                }).then((result) => {
                if (result.isConfirmed) {
                    var url = "http://localhost:8000/api/companies/" + company.id + "/restore";
                    axios.post(url, this.company).then(response => {
                        this.success = response.data.success;
                        this.getCompany()
                        this.getDeletedCompany()
                    }).catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        }
                    });

                    Swal.fire(
                        'Geri Yüklendi!',
                        'Şirket Geri Yüklendi',
                        'success'
                    )
                }
            })
        },
        forceDeleteCompany(company){
            Swal.fire({
                title: 'Emin Misin?',
                text: "Şirketi Tamamen Silmek İstediğinize Emin Misin?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil',
                cancelButtonText: 'İptal',
                }).then((result) => {
                if (result.isConfirmed) {
                    var url = "http://localhost:8000/api/companies/" + company.id + "/force_delete";
                    axios.post(url, this.company).then(response => {
                        this.success = response.data.success;
                        this.getCompany()
                        this.getDeletedCompany()
                    }).catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        }
                    });

                    Swal.fire(
                        'Silindi!',
                        'Şirket Tamamen Silindi',
                        'success'
                    )
                }
            })
        }
    }
};
  </script>
  
  <style>
      
  </style>