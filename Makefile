.PHONY: test test-ci install update

update:
	composer update
install:
	composer install
test: install
	phpunit --test-suffix=Test.php test --coverage-html coverage/html
test-ci: install
	phpunit --test-suffix=Test.php test --coverage-clover build/logs/clover.xml

# Formatting goals
format:
	yarn format