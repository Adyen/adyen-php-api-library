openapi-generator-version:=6.4.0
openapi-generator-url:=https://repo1.maven.org/maven2/org/openapitools/openapi-generator-cli/$(openapi-generator-version)/openapi-generator-cli-$(openapi-generator-version).jar
openapi-generator-jar:=target/openapi-generator-cli.jar
openapi-generator-cli:=java -jar $(openapi-generator-jar)

generator:=php
modelGen:=AcsWebhooks BalanceControl BalancePlatform Checkout ConfigurationWebhooks Disputes Payments Payout Management ManagementWebhooks LegalEntityManagement TransactionWebhooks TransferWebhooks Transfers BinLookup StoredValue POSTerminalManagement Recurring ReportWebhooks
models:=src/Adyen/Model
output:=target/out

# Generate models (for each service)
models: $(modelGen)

BalanceControl: spec=BalanceControlService-v1
BalancePlatform: spec=BalancePlatformService-v2
BinLookup: spec=BinLookupService-v54
Checkout: spec=CheckoutService-v70
Disputes: spec=DisputeService-v30
DataProtection: spec=DataProtectionService-v1
StoredValue: spec=StoredValueService-v46
POSTerminalManagement: spec=TfmAPIService-v1
Payments: spec=PaymentService-v68
Recurring: spec=RecurringService-v68
Payout: spec=PayoutService-v68
Management: spec=ManagementService-v3
LegalEntityManagement: spec=LegalEntityService-v3
Transfers: spec=TransferService-v4

# BalanceWebhooks
AcsWebhooks: spec=BalancePlatformAcsNotification-v1
ConfigurationWebhooks: spec=BalancePlatformConfigurationNotification-v1
ReportWebhooks: spec=BalancePlatformReportNotification-v1
TransferWebhooks: spec=BalancePlatformTransferNotification-v4
TransactionWebhooks: spec=BalancePlatformTransactionNotification-v4
# ManagementWebhooks
ManagementWebhooks: spec=ManagementNotificationService-v3

# Classic Platforms
marketpay/account: spec=AccountService-v6
marketpay/fund: spec=FundService-v6
marketpay/configuration: spec=NotificationConfigurationService-v6
marketpay/webhooks: spec=MarketPayNotificationService-v6
hop: spec=HopService-v6

$(modelGen): target/spec $(openapi-generator-jar)
		rm -rf $(models)/$@ $(output)
		$(openapi-generator-cli) generate \
			-i target/spec/json/$(spec).json \
			-g $(generator) \
			-o $(output) \
			-t ./templates \
			--inline-schema-name-mappings PaymentRequest_paymentMethod=CheckoutPaymentMethod \
			--inline-schema-name-mappings DonationPaymentRequest_paymentMethod=DonationPaymentMethod \
			--model-package Model\\$@ \
			--api-package Service\\$@ \
			--reserved-words-mappings configuration=configuration \
			--skip-validate-spec \
			--additional-properties variableNamingConvention=camelCase \
			--additional-properties invokerPackage=Adyen \
			--additional-properties packageName=Adyen
		rm -rf src/Adyen/Service/$@ src/Adyen/Model/$@
		mv $(output)/lib/Model/$@ $(models)/$@
		mv $(output)/lib//ObjectSerializer.php $(models)/$@

# Service Generation; split up in to templates based on the size of the service. That is, some services have no subgroups and are thus generated in one single file, others are grouped in a directory.

Services:=BalancePlatform Checkout StoredValue Payments Payout Management LegalEntityManagement Transfers
SingleFileServices:=BalanceControl BinLookup DataProtection StoredValue POSTerminalManagement Recurring Disputes

all: $(Services) $(SingleFileServices)

$(Services): target/spec $(openapi-generator-jar)
	rm -rf $(models)/$@ $(output)
	$(openapi-generator-cli) generate \
		-i target/spec/json/$(spec).json \
		-g $(generator) \
		-o $(output) \
		-t ./templates \
		--inline-schema-name-mappings PaymentRequest_paymentMethod=CheckoutPaymentMethod \
		--inline-schema-name-mappings DonationPaymentRequest_paymentMethod=DonationPaymentMethod \
		--model-package Model\\$@ \
		--api-package Service\\$@ \
		--inline-schema-name-mappings BankAccountInfo_accountIdentification=BankAccount \
		--reserved-words-mappings configuration=configuration \
		--skip-validate-spec \
		--additional-properties variableNamingConvention=camelCase \
		--additional-properties invokerPackage=Adyen \
		--additional-properties packageName=Adyen
	rm -rf src/Adyen/Service/$@ src/Adyen/Model/$@
	mv $(output)/lib/Model/$@ $(models)/$@
	mv $(output)/lib/ObjectSerializer.php $(models)/$@
	mkdir src/Adyen/Service/$@
	mv $(output)/lib/Service/* src/Adyen/Service

$(SingleFileServices): target/spec $(openapi-generator-jar)
	rm -rf $(models)/$@ $(output)
	$(openapi-generator-cli) generate \
		-i target/spec/json/$(spec).json \
		-g $(generator) \
		-o $(output) \
		-c templates/config.yaml \
		--model-package Model\\$@ \
		--api-package Service\\$@ \
		--inline-schema-name-mappings PaymentRequest_paymentMethod=CheckoutPaymentMethod \
		--inline-schema-name-mappings DonationPaymentRequest_paymentMethod=DonationPaymentMethod \
		--reserved-words-mappings configuration=configuration \
		--skip-validate-spec \
		--additional-properties variableNamingConvention=camelCase \
		--additional-properties customApi=$@ \
		--additional-properties invokerPackage=Adyen \
		--additional-properties packageName=Adyen
	rm -rf src/Adyen/Service/$@Api src/Adyen/Model/$@
	mv $(output)/lib/Model/$@ $(models)/$@
	mv $(output)/lib/ObjectSerializer.php $(models)/$@
	mv $(output)/lib/Service/$@/*ApiSingle.php src/Adyen/Service/$@Api.php

# Checkout spec (and patch version)
target/spec:
	git clone https://github.com/Adyen/adyen-openapi.git target/spec
	perl -i -pe's/"openapi" : "3.[0-9].[0-9]"/"openapi" : "3.0.0"/' target/spec/json/*.json


# Extract templates (copy them for modifications)
templates: $(openapi-generator-jar)
	$(openapi-generator-cli) author template -g $(generator) -o target/templates


# Download the generator
$(openapi-generator-jar):
	wget --quiet -o /dev/null $(openapi-generator-url) -O $(openapi-generator-jar)


# Discard generated artifacts and changed models
clean:
	rm -rf $(output)
	git checkout $(models)
	git clean -f -d $(models)


## Releases

version:
	perl -lne 'print "currentVersion=$$1" if /LIB_VERSION = "(.+)";/' < src/Adyen/Client.php >> "$$GITHUB_OUTPUT"

bump:
	perl -i -pe 's/$$ENV{"CURRENT_VERSION"}/$$ENV{"NEXT_VERSION"}/' src/Adyen/Client.php

.PHONY: templates models $(services) version bump
