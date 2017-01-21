.PHONY: docs test install update

update:
	composer update
install:
	composer install
test: install
	phpunit --test-suffix=Test.php test --coverage-html coverage/html --coverage-clover build/logs/clover.xml
