<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="La fitxa de client de Parlem">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" />

    <title>Fitxa de client</title>
</head>

<body>
    <div class="container" id="app">
        <h1>Fitxa de client</h1>
        <form class="mb-3">
            <div class="form-group">
                <select type="select" class="form-control" id="customer" @change="loadCustomerInfo"
                    aria-describedby="customer-help">
                    <option value="">-- Selecciona el client --</option>
                    <option v-for="item in customers" :value="item.customerId">
                        @{{ item.givenName + ' ' + item.familyName1 }}</option>
                </select>
                <small id="customer-help" class="form-text text-muted">Selecciona el client que vols mostrar la seva
                    informació</small>
            </div>
        </form>

        <div id="nocustomer-box" v-if="status==='INITIAL'">
            <p class="text-center text-muted">CLIENT A MOSTRAR NO SELECCIONAT</p>
        </div>

        <div id="loading-box" v-if="status==='LOADING'">
            <p class="text-center text-muted">Carregant ...</p>
        </div>

        <div id="loaded-box" v-if="status==='LOADED'">
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="name">Nom</label>
                        <div id="name">@{{ customerInfo.givenName }}</div>
                    </div>
                    <div class="col-md-8">
                        <label for="family-name">Cognoms</label>
                        <div id="family-name">@{{ customerInfo.familyName1 }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            Document
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="document-type">Tipus</label>
                                    <div id="document-type">@{{ customerInfo.docType }}</div>
                                </div>
                                <div class="col-md-8">
                                    <label for="document-type">Número</label>
                                    <div id="document-number">@{{ customerInfo.docNum }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card mb-3">
                        <div class="card-header bg-primary text-white">
                            Contacte
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email">E-mail</label>
                                    <div id="email">@{{ customerInfo.email }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="telephone">Telèfon</label>
                                    <div id="telephone">@{{ customerInfo.phone }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-secondary text-white">
                    Productes contractats
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <th>Data contractació</th>
                            <th>Producte</th>
                        </thead>
                        <tbody>
                            <tr v-for="productInfo in customerProducts">
                                <td>@{{ productInfo.soldAt }}</td>
                                <td>@{{ productInfo.productName }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
