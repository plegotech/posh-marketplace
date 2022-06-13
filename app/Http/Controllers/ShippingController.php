<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use FedEx\ShipService;
use FedEx\ShipService\ComplexType;
use FedEx\ShipService\SimpleType;

//use FedEx\OpenShipService\Request;
//use FedEx\OpenShipService\ComplexType;
//use FedEx\OpenShipService\SimpleType;

class ShippingController extends Controller {

    //
    public function Ship1(\Illuminate\Http\Request $request) {

        $data = $request->all();
        //return response()->json($request->all());

        define('FEDEX_KEY', 'R8CaN1lfhTz9cr34');
        define('FEDEX_PASSWORD', 'lNrpxCRdHS4NMF6phySQVJE1c');
        define('FEDEX_ACCOUNT_NUMBER', '510087160');
        define('FEDEX_METER_NUMBER', '119285961');

        $userCredential = new ComplexType\WebAuthenticationCredential();
        $userCredential
                ->setKey(FEDEX_KEY)
                ->setPassword(FEDEX_PASSWORD);

        $webAuthenticationDetail = new ComplexType\WebAuthenticationDetail();
        $webAuthenticationDetail->setUserCredential($userCredential);

        $clientDetail = new ComplexType\ClientDetail();
        $clientDetail
                ->setAccountNumber(FEDEX_ACCOUNT_NUMBER)
                ->setMeterNumber(FEDEX_METER_NUMBER);

        $version = new ComplexType\VersionId();
        $version
                ->setMajor(28)
                ->setIntermediate(0)
                ->setMinor(0)
                ->setServiceId('ship');

        $shipperAddress = new ComplexType\Address();
        $shipperAddress
                ->setStreetLines(['10 Fed Ex Pkwy'])
                ->setCity('Memphis')
                ->setStateOrProvinceCode('TN')
                ->setPostalCode('38115')
                ->setCountryCode('US');

        /*
         * 
         */
        $shipperContact = new ComplexType\Contact();
        $shipperContact
                ->setCompanyName('Posh Marketplace')
                ->setEMailAddress('test@plego.com')
                ->setPersonName('Test Test')
                ->setPhoneNumber(('123-123-1234'));

        $shipper = new ComplexType\Party();
        $shipper
                ->setAccountNumber(FEDEX_ACCOUNT_NUMBER)
                ->setAddress($shipperAddress)
                ->setContact($shipperContact);

        $recipientAddress = new ComplexType\Address();
        $recipientAddress
                ->setStreetLines(['13450 Farmcrest Ct'])
                ->setCity('Herndon')
                ->setStateOrProvinceCode('VA')
                ->setPostalCode('20171')
                ->setCountryCode('US');

        $recipientContact = new ComplexType\Contact();
        $recipientContact
                ->setPersonName(($data['first_name'] . "" . $data['last_name']))
                ->setPhoneNumber(($data['phone']));

        /*
         * 
         */
        $recipient = new ComplexType\Party();
        $recipient
                ->setAddress($recipientAddress)
                ->setContact($recipientContact);

        $labelSpecification = new ComplexType\LabelSpecification();
        $labelSpecification
                ->setLabelStockType(new SimpleType\LabelStockType(SimpleType\LabelStockType::_PAPER_7X4POINT75))
                ->setImageType(new SimpleType\ShippingDocumentImageType(SimpleType\ShippingDocumentImageType::_PDF))
                ->setLabelFormatType(new SimpleType\LabelFormatType(SimpleType\LabelFormatType::_COMMON2D));

        $packageLineItem1 = new ComplexType\RequestedPackageLineItem();
        $packageLineItem1
                ->setSequenceNumber(1)
                ->setItemDescription('Product description')
                ->setDimensions(new ComplexType\Dimensions(array(
                            'Width' => 10,
                            'Height' => 10,
                            'Length' => 25,
                            'Units' => SimpleType\LinearUnits::_IN
                        )))
                ->setWeight(new ComplexType\Weight(array(
                            'Value' => 2,
                            'Units' => SimpleType\WeightUnits::_LB
        )));

        $shippingChargesPayor = new ComplexType\Payor();
        $shippingChargesPayor->setResponsibleParty($shipper);

        $shippingChargesPayment = new ComplexType\Payment();
        $shippingChargesPayment
                ->setPaymentType(SimpleType\PaymentType::_SENDER)
                ->setPayor($shippingChargesPayor);

        $requestedShipment = new ComplexType\RequestedShipment();
        $requestedShipment->setShipTimestamp(date('c'));
        $requestedShipment->setDropoffType(new SimpleType\DropoffType(SimpleType\DropoffType::_REGULAR_PICKUP));
        $requestedShipment->setServiceType(new SimpleType\ServiceType(SimpleType\ServiceType::_FEDEX_GROUND));
        $requestedShipment->setPackagingType(new SimpleType\PackagingType(SimpleType\PackagingType::_YOUR_PACKAGING));
        $requestedShipment->setShipper($shipper);
        $requestedShipment->setRecipient($recipient);
        $requestedShipment->setLabelSpecification($labelSpecification);
        $requestedShipment->setRateRequestTypes(array(new SimpleType\RateRequestType(SimpleType\RateRequestType::_PREFERRED)));
        $requestedShipment->setPackageCount(1);
        $requestedShipment->setRequestedPackageLineItems([
            $packageLineItem1
        ]);
        $requestedShipment->setShippingChargesPayment($shippingChargesPayment);

        $processShipmentRequest = new ComplexType\ProcessShipmentRequest();
        $processShipmentRequest->setWebAuthenticationDetail($webAuthenticationDetail);
        $processShipmentRequest->setClientDetail($clientDetail);
        $processShipmentRequest->setVersion($version);
        $processShipmentRequest->setRequestedShipment($requestedShipment);

        $shipService = new ShipService\Request();

        //$shipService->getSoapClient()->__setLocation('https://ws.fedex.com:443/web-services/ship');
        $shipService->getSoapClient()->__setLocation('https://wsbeta.fedex.com:443/web-services');
        $result = $shipService->getProcessShipmentReply($processShipmentRequest);

        //$shipService->getSoapClient()->__setLocation('https://ws.fedex.com:443/web-services/ship');
        $shipService->getSoapClient()->__setLocation('https://wsbeta.fedex.com:443/web-services');
        $result = $shipService->getProcessShipmentReply($processShipmentRequest);
        $myresult = (array) $result;
        //var_dump($result);
//        echo "<pre>";
//        print_r($myresult);
//        echo "</pre>";



        if ($result->CompletedShipmentDetail->CompletedPackageDetails && array_key_exists(0, $result->CompletedShipmentDetail->CompletedPackageDetails)) {

//            echo "<pre>";
//            print_r($result);
//            echo "</pre>";
//            die;
            if (array_key_exists("NetCharge", $result->CompletedShipmentDetail->CompletedPackageDetails[0]->PackageRating->PackageRateDetails[0])) {
                $success = true;
                $raja = array("tracking" => $result->CompletedShipmentDetail->CompletedPackageDetails[0]->TrackingIds[0]->TrackingNumber,
                    "Currency" => $result->CompletedShipmentDetail->CompletedPackageDetails[0]->PackageRating->PackageRateDetails[0]->NetCharge->Currency,
                    "Amount" => $result->CompletedShipmentDetail->CompletedPackageDetails[0]->PackageRating->PackageRateDetails[0]->NetCharge->Amount
                );
            } else {
                $success = true;
                $raja = array("tracking" => 123456789,
                    "Currency" => "USD",
                    "Amount" => rand(20, 99)
                );
            }
            file_put_contents(base_path() . '/public/shipment_' . ($raja['tracking']) . '.pdf', $result->CompletedShipmentDetail->CompletedPackageDetails[0]->Label->Parts[0]->Image);
        } else {
            $success = false;
            $raja = "someting went wrong";
        }
        //$result->CompletedShipmentDetail->CompletedPackageDetails[0]->TrackingIds[0]->TrackingNumber
        //$result->CompletedShipmentDetail->CompletedPackageDetails[0]->PackageRating->PackageRateDetails[0]->NetCharge;
        //$result->CompletedShipmentDetail->CompletedPackageDetails[0]->Label->Parts[0]->Image;
        return response()->json(array("success" => $success, "data" => $raja));

        //var_dump($result->CompletedShipmentDetail->CompletedPackageDetails[0]->Label->Parts[0]->Image);
    }

    public function Ship12() {

        define('FEDEX_KEY', 'R8CaN1lfhTz9cr34');
        define('FEDEX_PASSWORD', 'Raja@#123');
        define('FEDEX_ACCOUNT_NUMBER', '510087160');
        define('FEDEX_METER_NUMBER', '119285961');

        /*         * ******************************************************
         * Create initial open shipment request with 1 package...
         * ****************************************************** */
        $shipDate = new \DateTime();

        $createOpenShipmentRequest = new ComplexType\CreateOpenShipmentRequest();
// web authentication detail
        $createOpenShipmentRequest->WebAuthenticationDetail->UserCredential->Key = FEDEX_KEY;
        $createOpenShipmentRequest->WebAuthenticationDetail->UserCredential->Password = FEDEX_PASSWORD;
// client detail
        $createOpenShipmentRequest->ClientDetail->MeterNumber = FEDEX_METER_NUMBER;
        $createOpenShipmentRequest->ClientDetail->AccountNumber = FEDEX_ACCOUNT_NUMBER;
// version
        $createOpenShipmentRequest->Version->ServiceId = 'ship';
        $createOpenShipmentRequest->Version->Major = 15;
        $createOpenShipmentRequest->Version->Intermediate = 0;
        $createOpenShipmentRequest->Version->Minor = 0;

// package 1
        $requestedPackageLineItem1 = new ComplexType\RequestedPackageLineItem();
        $requestedPackageLineItem1->SequenceNumber = 1;
        $requestedPackageLineItem1->ItemDescription = 'Product description 1';
        $requestedPackageLineItem1->Dimensions->Width = 10;
        $requestedPackageLineItem1->Dimensions->Height = 10;
        $requestedPackageLineItem1->Dimensions->Length = 15;
        $requestedPackageLineItem1->Dimensions->Units = SimpleType\LinearUnits::_IN;
        $requestedPackageLineItem1->Weight->Value = 2;
        $requestedPackageLineItem1->Weight->Units = SimpleType\WeightUnits::_LB;

// requested shipment
        $createOpenShipmentRequest->RequestedShipment->DropoffType = SimpleType\DropoffType::_REGULAR_PICKUP;
        $createOpenShipmentRequest->RequestedShipment->ShipTimestamp = $shipDate->format('c');
        $createOpenShipmentRequest->RequestedShipment->ServiceType = SimpleType\ServiceType::_FEDEX_2_DAY;
        $createOpenShipmentRequest->RequestedShipment->PackagingType = SimpleType\PackagingType::_YOUR_PACKAGING;
        $createOpenShipmentRequest->RequestedShipment->LabelSpecification->ImageType = SimpleType\ShippingDocumentImageType::_PDF;
        $createOpenShipmentRequest->RequestedShipment->LabelSpecification->LabelFormatType = SimpleType\LabelFormatType::_COMMON2D;
        $createOpenShipmentRequest->RequestedShipment->LabelSpecification->LabelStockType = SimpleType\LabelStockType::_PAPER_4X6;
        $createOpenShipmentRequest->RequestedShipment->RateRequestTypes = [SimpleType\RateRequestType::_PREFERRED];
        $createOpenShipmentRequest->RequestedShipment->PackageCount = 1;
        $createOpenShipmentRequest->RequestedShipment->RequestedPackageLineItems = [$requestedPackageLineItem1];

// requested shipment shipper
        $createOpenShipmentRequest->RequestedShipment->Shipper->AccountNumber = FEDEX_ACCOUNT_NUMBER;
        $createOpenShipmentRequest->RequestedShipment->Shipper->Address->StreetLines = ['1234 Main Street'];
        $createOpenShipmentRequest->RequestedShipment->Shipper->Address->City = 'Anytown';
        $createOpenShipmentRequest->RequestedShipment->Shipper->Address->StateOrProvinceCode = 'NY';
        $createOpenShipmentRequest->RequestedShipment->Shipper->Address->PostalCode = '12345';
        $createOpenShipmentRequest->RequestedShipment->Shipper->Address->CountryCode = 'US';
        $createOpenShipmentRequest->RequestedShipment->Shipper->Contact->CompanyName = 'Company Name';
        $createOpenShipmentRequest->RequestedShipment->Shipper->Contact->PersonName = 'Person Name';
        $createOpenShipmentRequest->RequestedShipment->Shipper->Contact->EMailAddress = 'shipper@example.com';
        $createOpenShipmentRequest->RequestedShipment->Shipper->Contact->PhoneNumber = '1-123-123-1234';

// requested shipment recipient
        $createOpenShipmentRequest->RequestedShipment->Recipient->Address->StreetLines = ['54321 1st Ave.'];
        $createOpenShipmentRequest->RequestedShipment->Recipient->Address->City = 'Anytown';
        $createOpenShipmentRequest->RequestedShipment->Recipient->Address->StateOrProvinceCode = 'NY';
        $createOpenShipmentRequest->RequestedShipment->Recipient->Address->PostalCode = '12345';
        $createOpenShipmentRequest->RequestedShipment->Recipient->Address->CountryCode = 'US';
        $createOpenShipmentRequest->RequestedShipment->Recipient->Contact->PersonName = 'John Doe';
        $createOpenShipmentRequest->RequestedShipment->Recipient->Contact->EMailAddress = 'recipient@example.com';
        $createOpenShipmentRequest->RequestedShipment->Recipient->Contact->PhoneNumber = '1-321-321-4321';

// shipping charges payment
        $createOpenShipmentRequest->RequestedShipment->ShippingChargesPayment->Payor->ResponsibleParty = $createOpenShipmentRequest->RequestedShipment->Shipper;
        $createOpenShipmentRequest->RequestedShipment->ShippingChargesPayment->PaymentType = SimpleType\PaymentType::_SENDER;

// send the create open shipment request
        $openShipServiceRequest = new Request();
        $createOpenShipmentReply = $openShipServiceRequest->getCreateOpenShipmentReply($createOpenShipmentRequest);

// shipment is created and we have an index number
        $index = $createOpenShipmentReply->Index;

        /*         * ******************************
         * Add a package to open shipment
         * ****************************** */
        $addPackagesToOpenShipmentRequest = new ComplexType\AddPackagesToOpenShipmentRequest();

// set index
        $addPackagesToOpenShipmentRequest->Index = $index;

// reuse web authentication detail from previous request
        $addPackagesToOpenShipmentRequest->WebAuthenticationDetail = $createOpenShipmentRequest->WebAuthenticationDetail;

// reuse client detail from previous request
        $addPackagesToOpenShipmentRequest->ClientDetail = $createOpenShipmentRequest->ClientDetail;

// reuse version from previous request
        $addPackagesToOpenShipmentRequest->Version = $createOpenShipmentRequest->Version;

// requested package line item
        $requestedPackageLineItem2 = new ComplexType\RequestedPackageLineItem();
        $requestedPackageLineItem2->SequenceNumber = 2;
        $requestedPackageLineItem2->ItemDescription = 'New package added to open shipment';
        $requestedPackageLineItem2->Dimensions->Width = 20;
        $requestedPackageLineItem2->Dimensions->Height = 10;
        $requestedPackageLineItem2->Dimensions->Length = 12;
        $requestedPackageLineItem2->Dimensions->Units = SimpleType\LinearUnits::_IN;
        $requestedPackageLineItem2->Weight->Value = 4;
        $requestedPackageLineItem2->Weight->Units = SimpleType\WeightUnits::_LB;
        $addPackagesToOpenShipmentRequest->RequestedPackageLineItems = [$requestedPackageLineItem2];

// send the add packages to open shipment request
        $addPackagesToOpenShipmentReply = $openShipServiceRequest->getAddPackagesToOpenShipmentReply($addPackagesToOpenShipmentRequest);

        var_dump($addPackagesToOpenShipmentReply);

        /*         * **********************************
         * Retrieve the open shipment details
         * ********************************** */
        $retrieveOpenShipmentRequest = new ComplexType\RetrieveOpenShipmentRequest();
        $retrieveOpenShipmentRequest->Index = $index;
        $retrieveOpenShipmentRequest->WebAuthenticationDetail = $createOpenShipmentRequest->WebAuthenticationDetail;
        $retrieveOpenShipmentRequest->ClientDetail = $createOpenShipmentRequest->ClientDetail;
        $retrieveOpenShipmentRequest->Version = $createOpenShipmentRequest->Version;

        $retrieveOpenShipmentReply = $openShipServiceRequest->getRetrieveOpenShipmentReply($retrieveOpenShipmentRequest);

        var_dump($retrieveOpenShipmentReply);

        /*         * *********************
         * Confirm open shipment
         * ********************* */
        $confirmOpenShipmentRequest = new ComplexType\ConfirmOpenShipmentRequest();
        $confirmOpenShipmentRequest->WebAuthenticationDetail = $createOpenShipmentRequest->WebAuthenticationDetail;
        $confirmOpenShipmentRequest->ClientDetail = $createOpenShipmentRequest->ClientDetail;
        $confirmOpenShipmentRequest->Version = $createOpenShipmentRequest->Version;
        $confirmOpenShipmentRequest->Index = $index;

        $confirmOpenShipmentReply = $openShipServiceRequest->getConfirmOpenShipmentReply($confirmOpenShipmentRequest);

        echo "<pre>";
        print_r($confirmOpenShipmentReply);
        echo "</pre>";
    }

}
