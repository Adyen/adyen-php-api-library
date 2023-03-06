openapi-generator-version:=6.3.0
openapi-generator-url:=https://repo1.maven.org/maven2/org/openapitools/openapi-generator-cli/$(openapi-generator-version)/openapi-generator-cli-$(openapi-generator-version).jar
openapi-generator-jar:=target/openapi-generator-cli.jar
openapi-generator-cli:=java -jar $(openapi-generator-jar)

generator:=php
services:=Transfers
models:=src/Adyen/Model
output:=target/out

# Generate models (for each service)
models: $(services)

Binlookup: spec=BinLookupService-v52
Checkout: spec=CheckoutService-v70
storedValue: spec=StoredValueService-v46
posterminalmanagement: spec=TfmAPIService-v1
payments: spec=PaymentService-v68
recurring: spec=RecurringService-v68
payout: spec=PayoutService-v68
management: spec=ManagementService-v1
management: resourceClass=Management
balanceplatform: spec=BalancePlatformService-v2
Transfers: spec=TransferService-v3
Transfers: service=transfers
legalentitymanagement: spec=LegalEntityService-v2
# Classic Platforms
marketpay/account: spec=AccountService-v6
marketpay/fund: spec=FundService-v6
marketpay/configuration: spec=NotificationConfigurationService-v6
marketpay/webhooks: spec=MarketPayNotificationService-v6
hop: spec=HopService-v6

$(services): target/spec $(openapi-generator-jar)
	rm -rf $(models)/$@ $(output)
	$(openapi-generator-cli) generate \
		-i target/spec/json/$(spec).json \
		-g $(generator) \
		-o $(output) \
		-c ./templates/config.yaml \
		--model-package $@ \
		--reserved-words-mappings configuration=configuration \
		--ignore-file-override ./.openapi-generator-ignore \
		--skip-validate-spec \
		--additional-properties invokerPackage=Adyen\\Model \
		--additional-properties packageName=Adyen\\Model\\$@
	mv $(output)/lib/$@ $(models)/$@
	mv $(output)/lib/ObjectSerializer.php $(models)/$@

Checkout: target/spec $(openapi-generator-jar)
	rm -rf $(models)/$@ $(output)
	$(openapi-generator-cli) generate \
		-i target/spec/json/$(spec).json \
		-g $(generator) \
		-o $(output) \
		-c ./templates/config.yaml \
		--model-package Model\\$@ \
		--api-package Service\\$@ \
		--reserved-words-mappings configuration=configuration \
		--ignore-file-override ./.openapi-generator-ignore \
		--skip-validate-spec \
		--additional-properties invokerPackage=Adyen \
		--additional-properties packageName=Adyen
	rm -rf src/Adyen/Service/$@ src/Adyen/Model/$@
	mv $(output)/lib/Model/$@ $(models)/$@
	mv $(output)/lib//ObjectSerializer.php $(models)/$@
	mkdir src/Adyen/Service/$@
	mv $(output)/lib/Service/* src/Adyen/Service

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


.PHONY: templates models $(services)