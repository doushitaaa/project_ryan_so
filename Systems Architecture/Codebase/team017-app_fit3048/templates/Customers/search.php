<!--Title Search for customer card-->
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Search Customers</h6>
                    </div>
                </div>

                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <!--Dashboard/Home button-->
                                <div class="col-6 pt-2 ">
                                    <button class="btn btn-white">
                                        <a href="<?= $this->Url->build('/') ?>">
                                            <i class="fa fa-home fixed-plugin-button-nav cursor-pointer icon-appear"></i></a>
                                        <?= $this->Html->link(__('< Dashboard'), ['controller' => 'pages', 'action' => 'admin'], ['class' => 'text-disappear ']) ?>
                                    </button>
                                </div>

                                <div class="row align-center">
                                    <div class="col-6 text-end">
                                        <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search']]) ?>
                                    </div>
                                </div>
                            </div>

                            <!--Search for Company-->
                            <form>
                                <div class="form-group container-fluid px-0" style="width: 80%">
                                    <div class="row">
                                        <div
                                            class="col-md-6">   <?= $this->Form->control('key', ['label' => 'Customer Name', 'class' => 'form-control', 'id' => 'searchbar', 'style' => 'border: 1px solid black; width:100%;', 'value' => $this->request->getQuery('key')]) ?></div>
                                        <div class="col-md-6 "
                                             style="padding-top: 2rem; !important;">   <?= $this->Form->submit('Search', ['class' => 'btn btn-success form-control', 'style' => 'width:90px;']) ?> </div>
                                        <small class="form-text text-muted">Please enter business name and select search
                                            for results.</small>
                                    </div>
                                </div>
                            </form>


                            <!--Display Selected Company -->
                            <br>
                            <row>
                                <div class="col-sm-10">
                                    <p style="text-align: center">Selected Company</p>
                                    <!-- Textform to display clicked company's id,name and address -->
                                    <?= $this->Form->text('company_id', ['class' => 'form-control', 'style' => 'text-align:center','id' => 'company_id', 'readonly' => 'readonly']) ?>
                                    <?= $this->Form->text('company_name', ['class' => 'form-control','style' => 'text-align:center', 'id' => 'company_name', 'readonly' => 'readonly']) ?>
                                    <?= $this->Form->text('company_address', ['class' => 'form-control', 'style' => 'text-align:center','id' => 'company_address', 'readonly' => 'readonly']) ?>
                                </div>
                            </row>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <!-- Display customer and their address in a table -->
                        <div class="card-header pb-0 p-3">

                        <!--List of Companies Table-->
                        <div class="card-header pb-0 p-3">
                            <div style="overflow-x:auto;">
                                <div class="table-responsive p-0">

                                    <table class="table align-items-center mb-0 table-hover" style="width:100%">
                                        <thead>
                                        <tr class="customer-table">
                                            <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7"><?= $this->Paginator->sort('company_name') ?></th>
                                            <th class="address-cell"><?= __('Address') ?></th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <?php foreach ($customers as $customer): ?>
                                            <tr class="customer-table">
                                                <td class="text-bold">
                                                    <?= $this->Html->link(h($customer->company_name), '#', ['class' => 'company-link', 'data-company' => h($customer->uid), 'data-address' => h($customer->address)]) ?>
                                                </td>

                                                <td data-th="Address: "
                                                    class="address-cell"><?= h($customer->address) ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>


                                <div class="paginator m-4">
                                    <ul class="pagination">
                                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                        <?= $this->Paginator->numbers() ?>
                                        <?= $this->Paginator->next(__('next') . ' >') ?>
                                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                                    </ul>
                                    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                                </div>
                            </div>
                        </div>

                        <!--Next Button-->
                        <div class="card-header pb-3 p-3">
                            <div class="row">
                                <!-- Button to save selected company and goto order page -->
                                <div class="col-12 text-end">
                                    <button id="saveButton" class="btn btn-success col-sm-3" style="width:90px;">Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>


    </div>
</div>
</div>
</div>


</div>
</main>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const companyLinks = document.querySelectorAll('.company-link');
        const companyIdInput = document.getElementById('company_id');
        const companyNameInput = document.getElementById('company_name');
        const companyAddressInput = document.getElementById('company_address');
        const saveButton = document.getElementById('saveButton');

        companyLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const companyName = this.innerText; // Get the company name from the link text
                const companyId = this.dataset.company; // Get the company ID from the data attribute
                const companyAddress = this.dataset.address; // Get the company address from the data attribute

                // Set the values of the input fields
                companyIdInput.value = `UID: ${companyId}`;
                companyNameInput.value = `Name: ${companyName}`;
                companyAddressInput.value = `Address: ${companyAddress}`;
            });
        });


        saveButton.addEventListener('click', function () {
        const companyId = companyIdInput.value;
        const companyName = companyNameInput.value;
        const companyAddress = companyAddressInput.value;

        // Build the URL with the company ID, name, and address
        const url = "<?= $this->Url->build(['controller' => 'customers', 'action' => 'customerorder']) ?>";
        const encodedCompanyId = encodeURIComponent(companyId);
        const encodedCompanyName = encodeURIComponent(companyName);
        const encodedCompanyAddress = encodeURIComponent(companyAddress);
        const fullUrl = `${url}?companyId=${encodedCompanyId}&companyName=${encodedCompanyName}&companyAddress=${encodedCompanyAddress}`;

        // Redirect to the URL
        window.location.href = fullUrl;
    });
    });
</script>

<style>


    .address-cell {
        padding-left: 200px;
    }

    @media only screen and (max-width: 960px) {
        thead th:not(:first-child) {
            display: none;
        }

        td, th {
            display: block;
        }

        td[data-th]:before {
            content: attr(data-th);
        }
    }

    #searchbar {
        width: 40%;
    }

    .customer-table {
        text-align: start;
        margin-left: 80px;
    }

    @media screen and (min-width: 400px) {
        .searchTitle {
            right: auto;
            left: 200px;
        }
    }

</style>






