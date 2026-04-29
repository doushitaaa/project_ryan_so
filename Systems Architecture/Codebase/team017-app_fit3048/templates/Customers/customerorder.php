<?php
/**
 * @var AppView $this
 * @var iterable<Customer> $customers
 * @var iterable<Items> $all_items
 */

use App\Model\Entity\Customer;
use App\Model\Entity\Items;
use App\View\AppView;
use Cake\I18n\FrozenTime;

?>

<head>
    <title>Table 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>


    <?= $this->Html->css(['table']) ?>
    <title>Barcode scanner</title>
    <script src="https://cdn.jsdelivr.net/npm/@ericblade/quagga2/dist/quagga.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

</head>


<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Create New Order</h6>
                    </div>
                </div>

                <div class="col-md-12 mb-lg-0 mb-4">
                    <div class="card mt-4">
                        <div class="card-header pb-0 p-3 align-center">
                            <!--Dashboard/Home button-->
                            <div class="col-6 pt-2 ">
                                <button class="btn btn-white">
                                    <a href="<?= $this->Url->build('/') ?>">
                                        <i class="fa fa-home fixed-plugin-button-nav cursor-pointer icon-appear"></i></a>
                                    <?= $this->Html->link(__('< Dashboard'), ['controller' => 'pages', 'action' => 'admin'], ['class' => 'text-disappear ']) ?>
                                </button>
                            </div>
                            <div style="text-align: center">
                                <a style="text-align: center">Please scan the doormats barcode in the below camera to
                                    add to customers order</a></div>
                            <section id="container" class="container align-center">
                                <div id="interactive" class="viewport" style="text-align: center">
                                    <canvas id="c" class="drawingBuffer"></canvas>
                                </div>
                                <div id="result_strip" class="codes"></div>
                                <div id="deviceSelection"></div>
                            </section>

                            <section class="ftco-section " style="width:100%">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 text-center mb-5">
                                            <h2 class="heading-section"> New Order</h2>
                                            <div class="row align-center">
                                                <p style="text-align: center">  <?= h($companyName) ?></p>
                                                <p style="text-align: center">  <?= h($companyAddress) ?></p>

                                            </div>
                                        </div>
                                        <div class="input-container">
                                            <input type="text" id="itemNumberInput" placeholder="Enter item code">
                                            <button id="clearButton" onclick="clearTextbox()">&times;</button>
                                        </div>
                                        <button class="btn btn-success" style="" onclick="addItemfromID()">Enter
                                        </button>
                                        <!--Customer Order Table-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="overflow-x:auto;">
                                                    <div class="table-responsive p-0">

                                                        <table class="table align-items-center mb-0" id="table-whole">
                                                            <thead class="thead-dark mb-10">
                                                            <tr class="customer-table">
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    Item #
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    QTY
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    Item DESC
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    Stock
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    Price
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    Discount Price
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    DISC %
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    Bale QTY
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    Subtotal
                                                                </th>
                                                                <th class="text-uppercase  text-start text-secondary font-weight-bolder opacity-7">
                                                                    &nbsp;
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="items">
                                                            </tbody>
                                                        </table>

                                                        <!--Memo for order-->
                                                        <div style="text-align: center">
                                                            <?= $this->Form->label('memo', 'Memo about order', ['class' => 'col-sm-2 col-form-label']) ?>
                                                            <?= $this->Form->textarea('memo', ['style' => 'width: 100%; height: 100px;', 'id' => 'memo']) ?>

                                                        </div>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="message success hidden" onclick="this.classList.add('hidden')"
                                             id="successMessage">All customers have been updated
                                        </div>
                                        <div class="card-header pb-0 p-3">
                                            <div class="row">
                                                <div class="col-6 d-flex align-items-center">
                                                </div>
                                                <div class="col-6 text-end">
                                                    <!-- Button to go to next page no functionality to attach to yet -->
                                                    <h6 id="totalPrice" class="text-Black text-capitalize ps-3">Total
                                                        Price: </h6>
                                                    <button id="saveButton" class="btn btn-success"
                                                            onclick="createOrder()" disabled>
                                                        Submit Order
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


</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const companyLinks = document.querySelectorAll('.company-link');
        const selectedCompanyInput = document.getElementById('selected_company');
        const saveButton = document.getElementById('saveButton');

        companyLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const companyName = this.dataset.company;
                selectedCompanyInput.value = companyName;
            });
        });

        saveButton.addEventListener('click', function () {
            const companyName = selectedCompanyInput.value;
            window.location.href = '/customers/customerorder?companyName=' + encodeURIComponent(companyName);
        });
    });
</script>

<style>
    .address-cell {
        padding-left: 200px;
    }

    .customer-table {
        text-align: start;
        margin-left: 80px;
    }

    #c {
        width: 10px;
        height: 10px;
        /*max-width: 50%;*/

    }

    video {
        width: 40%;
        height: auto;
    }

    .message-box {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .input-container {
        position: relative;
        display: inline-block;
        padding: 2px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #itemNumberInput {
        border: none;
        padding-right: 30px;
        width: 200px;
        outline: none;

    }

    #clearButton {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        background: transparent;
        border: none;
        cursor: pointer;
        font-size: 18px;

    }


</style>


<script type="text/javascript">
    let resultCollector = Quagga.ResultCollector.create({
        capture: true,
        capacity: 20,
        blacklist: [
            {
                code: "WIWV8ETQZ1", format: "code_93"
            }, {
                code: "EH3C-%GU23RK3", format: "code_93"
            }, {
                code: "O308SIHQOXN5SA/PJ", format: "code_93"
            }, {
                code: "DG7Q$TV8JQ/EN", format: "code_93"
            }, {
                code: "VOFD1DB5A.1F6QU", format: "code_93"
            }, {
                code: "4SO64P4X8 U4YUU1T-", format: "code_93"
            }],
        filter: true
    });

    // idk how quagga works, I just copied the code from the example on the github
    var App = {

        init: function () {
            var self = this;

            Quagga.init(this.state, function (err) {
                if (err) {
                    return self.handleError(err);
                }
                //Quagga.registerResultCollector(resultCollector);
                App.attachListeners();
                App.checkCapabilities();
                Quagga.start();
            });
        },
        handleError: function (err) {
        },
        checkCapabilities: function () {
            var track = Quagga.CameraAccess.getActiveTrack();
            var capabilities = {};
            if (typeof track.getCapabilities === 'function') {
                capabilities = track.getCapabilities();
            }
            this.applySettingsVisibility('zoom', capabilities.zoom);
            this.applySettingsVisibility('torch', capabilities.torch);
        },
        updateOptionsForMediaRange: function (node, range) {

            var NUM_STEPS = 6;
            var stepSize = (range.max - range.min) / NUM_STEPS;
            var option;
            var value;
            while (node.firstChild) {
                node.removeChild(node.firstChild);
            }
            for (var i = 0; i <= NUM_STEPS; i++) {
                value = range.min + (stepSize * i);
                option = document.createElement('option');
                option.value = value;
                option.innerHTML = value;
                node.appendChild(option);
            }
        },
        applySettingsVisibility: function (setting, capability) {
            // depending on type of capability
            if (typeof capability === 'boolean') {
                var node = document.querySelector('input[name="settings_' + setting + '"]');
                if (node) {
                    node.parentNode.style.display = capability ? 'block' : 'none';
                }
                return;
            }
            if (window.MediaSettingsRange && capability instanceof window.MediaSettingsRange) {
                var node = document.querySelector('select[name="settings_' + setting + '"]');
                if (node) {
                    this.updateOptionsForMediaRange(node, capability);
                    node.parentNode.style.display = 'block';
                }

            }
        },
        initCameraSelection: function () {
            return Quagga.CameraAccess.enumerateVideoDevices()
                .then(function (devices) {
                    function pruneText(text) {
                        return text.length > 30 ? text.substr(0, 30) : text;
                    }
                });

        },
        attachListeners: function () {
            var self = this;

            self.initCameraSelection();

            $(".controls .reader-config-group").on("change", "input, select", function (e) {
                e.preventDefault();
                var $target = $(e.target),
                    value = $target.attr("type") === "checkbox" ? $target.prop("checked") : $target.val(),
                    name = $target.attr("name"),
                    state = self._convertNameToState(name);

                self.setState(state, value);
            });
            document.getElementsByClassName("drawingBuffer").height = "0px";

        },
        _accessByPath: function (obj, path, val) {
            var parts = path.split('.'),
                depth = parts.length,
                setter = (typeof val !== "undefined") ? true : false;

            return parts.reduce(function (o, key, i) {
                if (setter && (i + 1) === depth) {
                    if (typeof o[key] === "object" && typeof val === "object") {
                        Object.assign(o[key], val);
                    } else {
                        o[key] = val;
                    }
                }
                return key in o ? o[key] : {};
            }, obj);
        },
        _convertNameToState: function (name) {
            return name.replace("_", ".").split("-").reduce(function (result, value) {
                return result + value.charAt(0).toUpperCase() + value.substring(1);
            });
        },
        detachListeners: function () {
            $(".controls").off("click", "button.stop");
            $(".controls .reader-config-group").off("change", "input, select");
        },
        applySetting: function (setting, value) {
            var track = Quagga.CameraAccess.getActiveTrack();
            if (track && typeof track.getCapabilities === 'function') {
                switch (setting) {
                    case 'zoom':
                        return track.applyConstraints({advanced: [{zoom: parseFloat(value)}]});
                    case 'torch':
                        return track.applyConstraints({advanced: [{torch: !!value}]});
                }
            }
        },
        setState: function (path, value) {
            var self = this;

            if (typeof self._accessByPath(self.inputMapper, path) === "function") {
                value = self._accessByPath(self.inputMapper, path)(value);
            }

            if (path.startsWith('settings.')) {
                var setting = path.substring(9);
                return self.applySetting(setting, value);
            }
            self._accessByPath(self.state, path, value);

            App.detachListeners();
            Quagga.stop();
            App.init();
        },
        inputMapper: {
            inputStream: {
                constraints: function (value) {
                    if (/^(\d+)x(\d+)$/.test(value)) {
                        var values = value.split('x');
                        return {
                            width: {min: parseInt(values[0])},
                            height: {min: parseInt(values[1])}
                        };
                    }
                    return {
                        deviceId: value
                    };
                }
            },
            numOfWorkers: function (value) {
                return parseInt(value);
            },
            decoder: {
                readers: function (value) {
                    if (value === 'ean_extended') {
                        return [{
                            format: "ean_reader",
                            config: {
                                supplements: [
                                    'ean_5_reader', 'ean_2_reader'
                                ]
                            }
                        }];
                    }
                    return [{
                        format: value + "_reader",
                        config: {}
                    }];
                }
            }
        },
        state: {
            inputStream: {
                type: "LiveStream",
                constraints: {
                    width: {min: 200},
                    height: {min: 100},
                    facingMode: "environment",
                    aspectRatio: {min: 1, max: 2}
                }
            },
            locator: {
                patchSize: "medium",
                halfSample: true
            },
            decoder: {
                readers: [{
                    format: "ean_reader",
                    config: {}
                }]
            },
            locate: true
        },
        lastResult: null
    }


    App.init();

    var rowCount = 0;

    var items = [];
    // when a barcode is detected on camera
    Quagga.onDetected(function (result) {
            var code = result.codeResult.code;

            if (App.lastResult !== code) {
                App.lastResult = code;
                var canvas = Quagga.canvas.dom.image;

                // make an ajax request to get all potential barcode
                $.ajax({
                    url: '<?php echo $this->Url->build(['controller' => 'Customers', 'action' => 'getitem']); ?>',
                    method: 'GET',
                    dataType: 'json', // Expect JSON response
                    success: function (response) {
                        // Handle the JSON response here
                        // Loop through json list and append the data to a table
                        for (var i = 0; i < response.length; i++) {
                            if (response[i]["barcode"] == code) {
                                if (items.filter(item => item.uid === response[i].uid).length === 0) {
                                    response[i].qty = 1;
                                    response[i].price = parseFloat(response[i].price);
                                    response[i].subtotal = response[i].price;
                                    items.push(response[i]);
                                    $('#saveButton').attr('disabled', false);
                                    showMessage('Item has been successfully added');
                                }
                                reloadTable();
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                    }
                });
            }
        }
    )

    let selectedItems = [];

    function createOrder() {
        // set header item
        let lines = [{
            "Type": "Header",
            "Description": "Order for doormats through Barcode Scanner"
        }];

        let totalPrice = 0;

        // create a new item in the right format for MYOB for each scanned item
        for (let i in selectedItems) {
            let itemUid = {UID: selectedItems[i].uid};
            let taxCode = {
                "UID": "33c48787-7e0e-4102-af6c-94aeed662333",
                "Code": "GST",
                "URI": "https://arl2.api.myob.com/accountright/48d8b367-05e9-4bcb-86d4-b7fc464e944e/GeneralLedger/TaxCode/33c48787-7e0e-4102-af6c-94aeed662333"
            };
            let itemSubTotal = selectedItems[i].price;
            if (selectedItems[i].subtotal != null) {
                itemSubTotal = selectedItems[i].subtotal;
            }
            lines.push({
                Type: "Transaction",
                Description: selectedItems[i].name,
                ShipQuantity: selectedItems[i].qty,
                UnitPrice: parseFloat(selectedItems[i].price),
                DiscountPercent: selectedItems[i].disc,
                Total: itemSubTotal,
                Item: itemUid,
                TaxCode: taxCode
            });
            totalPrice += itemSubTotal;
        }

        // set the other variables that MYOB needs
        let customerUid = '<?= h($companyId) ?>';
        customerUid = customerUid.substring(5);

        let customerUidJson = {UID: customerUid}

        let companyAddress = '<?= h($companyAddress) ?>';
        companyAddress = companyAddress.substring(9);

        let orderToCreate = {
            Date: '<?= FrozenTime::now() ?>',
            ShipToAddress: companyAddress,
            Customer: customerUidJson,
            Lines: lines,
            Subtotal: parseFloat(totalPrice.toFixed(2)),
            Comment: $('#memo').val()
        };

        // if there's actually something to push to MYOB, send it to MYOB
        if (orderToCreate.Lines.length > 1) {
            $.ajax({
                url: '<?php echo $this->Url->build(['controller' => 'Customers', 'action' => 'createOrderInMyob']); ?>',
                method: 'POST',
                contentType: 'application/json', // Set the content type to JSON
                data: JSON.stringify(orderToCreate),
                beforeSend: () => confirm("Are you sure to submit order?"),
                success: function (myobId) {
                    alert('Order has been created');
                    orderToCreate.myobId = myobId;
                    window.location.href = '<?php echo $this->Url->build(['controller' => 'pages', 'action' => 'admin']); ?>';
                },
                error: function (xhr, status, error) {
                    // Handle errors if any
                    alert('Order creation has failed');
                }
            });
        }
    }

    function reloadTable() {
        let total = 0;
        $(".items").html('');
        for (let i in items) {
            // create a new row to add to the table
            var newRow = $("<tr>");
            newRow.append("<td>" + items[i]["number"] + "</td>");
            newRow.append(`<td ><input class="qty-input" type="number" value="${items[i].qty}" min="1" onchange="onQtyChange(event, ${items[i]['price']}, ${items[i]['bale_qty']}, '${items[i].uid}')" /></td>`);
            newRow.append("<td>" + items[i]["name"] + "</td>");
            newRow.append("<td>" + items[i]["qty_available"] + "</td>");
            newRow.append("<td>$" + items[i]["price"] + "</td>");
            newRow.append(`<td id="${items[i].uid}-discprice">${items[i].discprice ? '$' + items[i].discprice : 'FULL PRICE'}</td>`);
            newRow.append(`<td id="${items[i].uid}-disc">${items[i].disc ? 'TRUE(25%)' : 'FALSE'}</td>`);
            newRow.append("<td>" + items[i]["bale_qty"] + "</td>");
            newRow.append(`<td id="${items[i].uid}-total">$` + items[i].subtotal + "</td>");
            newRow.append(`<td><a href="javascript:void(0)" onclick="deleteItem('${items[i].uid}')"><span><i class="fa fa-close"></i></span></a></td>`);

            // check if item is already in the array
            let outOfItemArray = true;
            for (let j in selectedItems) {
                if (selectedItems[j].uid == items[i].uid) {
                    outOfItemArray = false;
                }
            }
            // Step 3: Extract and store the selected item in the array
            if (outOfItemArray) {
                selectedItems.push({
                    uid: items[i].uid,
                    qty: items[i].qty,
                    price: items[i].price,
                    disc: 0,
                    name: items[i].name
                    // Add more properties as needed
                });
            }

            $(".items").append(newRow);
            total += items[i].subtotal;
        }
        $('#totalPrice').html('Total Price: $' + total);
    }


    function deleteItem(uid) {
        // Find the item to delete in the items array
        const itemToDelete = items.find(item => item.uid === uid);

        // If the item is found, remove it from the items array
        if (itemToDelete) {
            items = items.filter(item => item.uid !== uid);
            reloadTable();
        }

        // Remove the item from the selectedItems array if it exists
        const selectedItemIndex = selectedItems.findIndex(item => item.uid === uid);
        if (selectedItemIndex !== -1) {
            selectedItems.splice(selectedItemIndex, 1);
        }
        reloadTable();
    }

    function deleteRow(rowId) {
        // Remove the row when the delete button is clicked
        $("#" + rowId).remove();
    }

    function onQtyChange(event, price, bale_qty, id) {
        let inputValue = event.target.valueAsNumber;
        if (inputValue < 1) {
            inputValue = 1;
            $(this).val(1);
        }
        // Increment the inputValue by bale_qty
        if (inputValue >= bale_qty) {
            if (inputValue % bale_qty == 1) {
                event.target.value = Math.ceil(inputValue / bale_qty) * bale_qty;
            } else if (inputValue % bale_qty == bale_qty - 1) {
                event.target.value = Math.floor(inputValue / bale_qty) * bale_qty;
            }
        }
        var qty = parseInt(event.target.value);
        var total = (qty * price);
        if (qty >= bale_qty) {
            total = total * 0.75;
        }
        const discValue = inputValue >= bale_qty;
        // updated information based on qty in table
        for (var i = 0; i < selectedItems.length; i++) {
            if (selectedItems[i].uid == id) {
                selectedItems[i].qty = qty;
                selectedItems[i].subtotal = parseFloat(total.toFixed(2));
                if (total < qty * price) {
                    selectedItems[i].disc = 25;
                } else {
                    selectedItems[i].disc = 0;
                }
                items[i].qty = qty;
                items[i].subtotal = parseFloat(total.toFixed(2));
                items[i].discprice = discValue ? parseFloat((price * 0.75).toFixed(2)) : undefined;
                items[i].disc = discValue;
            }
        }
        reloadTable();
    }

</script>
<script type="text/javascript">

    // Code for displaying camera
    // Idk how this works either, this was also copied from Quagga github

    navigator.mediaDevices.getUserMedia({video: true})

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
    window.URL = window.URL || window.webkitURL || window.mozURL || window.msURL;

    function getUserMedia(constraints, success, failure) {
        navigator.getUserMedia(constraints, function (stream) {
            var videoSrc = (window.URL && window.URL.createObjectURL(stream)) || stream;
            success.apply(null, [videoSrc]);
        }, failure);
    }

    async function getDevices() {
        return navigator.mediaDevices.enumerateDevices();
    }


    getDevices().then((devices) => {
            for (let i = 0; i < devices.length; i++) {
                if (devices[i].kind == "videoinput") {
                }
            }
        }
    )

    function initCamera(constraints, video, callback) {
        getUserMedia(constraints, function (src) {
            video.src = src;
            video.addEventListener('loadeddata', function () {
                var attempts = 10;

                function checkVideo() {
                    if (attempts > 0) {
                        if (video.videoWidth > 0 && video.videoHeight > 0) {
                            video.play();
                            callback();
                        } else {
                            window.setTimeout(checkVideo, 100);
                        }
                    } else {
                        callback('Unable to play video stream.');
                    }
                    attempts--;
                }

                checkVideo();
            }, false);
        }, function (e) {
        });
    }

    window.addEventListener('load', function () {
        var constraints = {
                video: {
                    mandatory: {
                        minWidth: 1280,
                        minHeight: 720
                    }
                }
            },
            video = document.createElement('video');

        document.body.appendChild(video);

        initCamera(constraints, video, function () {
        });
    }, false);

    function addItemfromID() {
        var itemNumber = document.getElementById('itemNumberInput').value;
        $.ajax({
            url: '<?php echo $this->Url->build(['controller' => 'Customers', 'action' => 'getitem']); ?>',
            method: 'GET',
            dataType: 'json', // Expect JSON response
            success: function (response) {
                // Handle the JSON response here
                // Loop through json list and append the data to a table
                for (var i = 0; i < response.length; i++) {
                    if (response[i]["number"] == itemNumber) {
                        if (items.filter(item => item.uid === response[i].uid).length === 0) {
                            response[i].qty = 1;
                            response[i].price = parseFloat(response[i].price);
                            response[i].subtotal = response[i].price;
                            items.push(response[i]);
                            $('#saveButton').attr('disabled', false);
                            showMessage('Item has been successfully added');
                            clearTextbox()

                        }
                        reloadTable();


                    }
                }
            },
            error: function (xhr, status, error) {
            }
        });
    }

    function clearTextbox() {
        document.getElementById('itemNumberInput').value = '';
    }

    function showMessage(message) {
        // Create a new div element for the message box
        var messageBox = document.createElement('div');
        messageBox.className = 'message-box';
        messageBox.textContent = message;

        // Append the message box to the document body
        document.body.appendChild(messageBox);

        // Remove the message box after a certain duration (e.g. 1000 =1seconds)
        setTimeout(function () {
            messageBox.remove();
        }, 1000);
    }


</script>

<script src="../js/core/popper.min.js"></script>
<script src="../js/core/bootstrap.min.js"></script>
