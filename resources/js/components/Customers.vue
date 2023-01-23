<template>
    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center">
            {{ companyName}}
            <button @click="clearCustomerandErrors()" type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Müşteri Ekle</button>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">İsim</th>
                    <th scope="col">Cinsiyet</th>
                    <th scope="col">Şehir</th>
                    <th scope="col">Ülke</th>
                    <th scope="col">Doğum Tarihi</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="( customer,index) in customers" v-bind:key="customer.id">
                    <th scope="row">{{index+1}}</th>
                    <td>{{ customer.first_name }}</td>
                    <td v-if="customer.is_male==0">Kadın</td>
                    <td v-if="customer.is_male==1">Erkek</td>
                    <td>{{ customer.city }}</td>
                    <td>{{ customer.country }}</td>
                    <td>{{ customer.birth_date }}</td>
                    <td>
                        <a @click="editCustomer(customer)" data-bs-toggle="modal" data-bs-target="#exampleModal1"  class="btn btn-sm btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                        </a>
                        <a @click="deleteCustomer(customer)"  class="btn btn-sm btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                        </a>
                       
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
                <h1 class="modal-title fs-5" id="exampleModalLabel">Müşteri Ekle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form @submit.prevent="storeCustomer">
                <div class="modal-body">
                    <div class="form-group">
                        <label>İsim</label>
                        <input type="text" v-model="customer.first_name" class="form-control" id="first_name" >
                        <div v-if="errors.first_name" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.first_name[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Cinsiyet</label>
                        <div class="form-check">
                            <input class="form-check-input" v-model="customer.is_male" type="radio" name="is_male" id="male" value="1" >
                            <label class="form-check-label" for="male">
                                Erkek
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="customer.is_male" type="radio" name="is_male" id="famale" value="0" >
                            <label class="form-check-label" for="famale">
                                Kadın
                            </label>
                        </div>
                        <div v-if="errors.is_male" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.is_male[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Şehir</label>
                        <input type="text" v-model="customer.city_id" class="form-control" id="name">
                        <div v-if="errors.city_id" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.city_id[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ülke</label>
                        <input type="text" v-model="customer.country" class="form-control" id="name">
                        <div v-if="errors.country" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.country[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birht_date">Doğum Tarihi</label>
                        <input type="date" class="form-control" v-model="customer.birth_date" id="birth_date" name="birth_date">
                        <div v-if="errors.birth_date" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.birth_date[0]}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary" >Kaydet</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Müşteri Güncelle</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form @submit.prevent="updateCustomer">
                <div class="modal-body">
                    <div class="form-group">
                        <label>İsim</label>
                        <input type="text" v-model="customer.first_name" class="form-control" id="first_name" >
                        <div v-if="errors.first_name" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.first_name[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Cinsiyet</label>
                        <div class="form-check">
                            <input class="form-check-input" v-model="customer.is_male" type="radio" name="is_male" id="male" value="1" >
                            <label class="form-check-label" for="male">
                                Erkek
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" v-model="customer.is_male" type="radio" name="is_male" id="famale" value="0" >
                            <label class="form-check-label" for="famale">
                                Kadın
                            </label>
                        </div>
                        <div v-if="errors.is_male" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.is_male[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Şehir</label>
                        <input type="text" v-model="customer.city_id" class="form-control" id="name">
                        <div v-if="errors.city_id" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.city[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Ülke</label>
                        <input type="text" v-model="customer.country" class="form-control" id="name">
                        <div v-if="errors.country" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.country[0]}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birht_date">Doğum Tarihi</label>
                        <input type="date" class="form-control" v-model="customer.birth_date" id="birth_date" name="birth_date">
                        <div v-if="errors.birth_date" >
                            <div class="alert alert-danger" role="alert">
                                {{errors.birth_date[0]}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-primary" >Kaydet</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="card ">
        <div class="card-header d-flex justify-content-between align-items-center">
           <button type="button" class="btn btn-info" v-on:click="isShow = !isShow" @click="getDeletedCustomer()" >Arşivlenmiş Müşterileri Göster</button>
        </div>
        <div class="card-body" v-show="isShow" >
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">İsim</th>
                    <th scope="col">Cinsiyet</th>
                    <th scope="col">Şehir</th>
                    <th scope="col">Ülke</th>
                    <th scope="col">Doğum Tarihi</th>
                    <th scope="col">Silinme Tarihi</th>
                    <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="( customer,index) in deleted_customers" v-bind:key="customer.id">
                        <th scope="row">{{index+1}}</th>
                        <td>{{ customer.first_name }}</td>
                        <td v-if="customer.is_male==0">Kadın</td>
                        <td v-if="customer.is_male==1">Erkek</td>
                        <td>{{ customer.city }}</td>
                        <td>{{ customer.country }}</td>
                        <td>{{ customer.birth_date }}</td>
                        <td>{{ customer.deleted_at }}</td>
                        <td>
                            <a @click="restoreCustomer(customer)"    class="btn btn-sm btn-dark">Geri Yükle</a>
                            <a @click="forceDeleteCustomer(customer)"   class="btn btn-sm btn-danger">Tamamen Sil</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
  </template>
  <script >
    import axios from 'axios';
    import Swal from 'sweetalert2'
    export default {
        
        data() {
            return {
            success: false,
                customer: {
                    id:'',
                    company_id:'',
                    birth_date:'',
                    is_male:'',
                    first_name:'',
                    city_id:'',
                    country:'',
                    deleted_at:'',
                    company: {
                        name:''
                    }
                },
                customers: [],
                deleted_customers: [],
                errors: [],
                isShow : false,
                companyName:''
            }
        },

        created() {
            this.getCustomer()

        },

        methods: {
            getCustomer() {
                var url = "http://127.0.0.1:8000/api/costumers/getByCompanyId/"+this.$route.params.id;
                axios.get(url).then(response => {
                    this.customers = response.data;
                    this.companyName = this.customers[0].company.name;
                });
            },
            storeCustomer() {
                var url = "http://localhost:8000/api/customers";
                this.customer.company_id=this.$route.params.id;
                axios.post(url, this.customer).then(response => {
                    this.success = response.data.success;
                    this.getCustomer()
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Müşteri eklendi',
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
            editCustomer(customer){
                this.customer=customer;
            },

            updateCustomer(){
                var url = "http://localhost:8000/api/customers/"+this.customer.id;
                axios.put(url, this.customer).then(
                    ({data})=>{
                        this.getCustomer();
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Müşteri güncellendi',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                )
            },

            deleteCustomer(customer) {
                Swal.fire({
                title: 'Emin Misin?',
                text: customer.first_name+" İsimli Müşteriyi Silmek İstediğinize Emin Misin?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sil',
                cancelButtonText: 'İptal',
                }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "http://localhost:8000/api/customers/"+customer.id;
                        axios.delete(url);
                        this.getCustomer();
                        this.getDeletedCustomer()
                        Swal.fire(
                            'Silindi!',
                            'Müşteri Silindi',
                            'success'
                        )
                    }
                })  
            },

            clearCustomerandErrors(){
                this.customer.id=''
                this.customer.first_name=''
                this.customer.is_male=''
                this.customer.city_id=''
                this.customer.country=''
                this.customer.birth_date=''
                this.errors=[]
            },

            getDeletedCustomer(){
                var url = "http://localhost:8000/api/deletedCustomers/"+this.$route.params.id;
                axios.get(url).then((response) => {
                this.deleted_customers = response.data;
                });
            },
            restoreCustomer(customer){
                Swal.fire({
                    title: 'Emin Misin?',
                    text: "Müşteriyi Geri Yükelemek İstediğinize Emin Misin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Geri Yükle',
                    cancelButtonText: 'İptal',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "http://localhost:8000/api/customers/" + customer.id + "/restore";
                        axios.post(url, this.customer).then(response => {
                            this.success = response.data.success;
                            this.getCustomer()
                            this.getDeletedCustomer()
                        }).catch(error => {
                            if (error.response.status == 422) {
                                this.errors = error.response.data.errors;
                            }
                        });

                        Swal.fire(
                            'Geri Yüklendi!',
                            'Müşteri Geri Yüklendi',
                            'success'
                        )
                    }
                })
            },
            forceDeleteCustomer(customer){
                Swal.fire({
                    title: 'Emin Misin?',
                    text: "Müşteriyi Tamamen Silmek İstediğinize Emin Misin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sil',
                    cancelButtonText: 'İptal',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        var url = "http://localhost:8000/api/customers/" + customer.id + "/force_delete";
                        axios.post(url, this.customer).then(response => {
                            this.success = response.data.success;
                            this.getCustomer()
                            this.getDeletedCustomer()
                        }).catch(error => {
                            if (error.response.status == 422) {
                                this.errors = error.response.data.errors;
                            }
                        });

                        Swal.fire(
                            'Silindi!',
                            'Müşteri Tamamen Silindi',
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