'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var Footer = function (_React$Component) {
	_inherits(Footer, _React$Component);

	function Footer(props) {
		_classCallCheck(this, Footer);

		return _possibleConstructorReturn(this, (Footer.__proto__ || Object.getPrototypeOf(Footer)).call(this, props));
	}

	_createClass(Footer, [{
		key: "render",
		value: function render() {
			return React.createElement(
				"div",
				{ className: "full-scale" },
				React.createElement(
					"div",
					{ className: "col-12", id: "footer-top-border" },
					React.createElement(
						"ul",
						null,
						React.createElement(
							"li",
							null,
							React.createElement(
								"a",
								{ className: "a-menu", href: "./kontakt.php" },
								"Kontakt"
							)
						),
						React.createElement(
							"li",
							null,
							React.createElement(
								"a",
								{ className: "a-menu", href: "./anfahrt.html" },
								"Anfahrt"
							)
						),
						React.createElement(
							"li",
							null,
							React.createElement(
								"a",
								{ className: "a-menu", href: "./impressum.html" },
								"Impressum"
							)
						),
						React.createElement(
							"li",
							null,
							React.createElement(
								"a",
								{ className: "a-menu", href: "./secure/admin-sortcontrol.php" },
								"Admin"
							)
						)
					)
				),
				React.createElement(
					"div",
					{ className: "col-12" },
					React.createElement(
						"p",
						{ className: "font-size-14" },
						"Hobby-Imkerei L\xFCck - im Norden von Berlin"
					)
				),
				React.createElement(
					"div",
					{ className: "col-12" },
					React.createElement(
						"p",
						{ className: "font-size-14" },
						"Webdesign by Martin Nowatschek"
					)
				),
				React.createElement(
					"div",
					{ className: "col-12", id: "copyright-background" },
					React.createElement(
						"p",
						{ className: "font-size-14" },
						"Copyright by Hauptstadtbiene 2019"
					)
				)
			);
		}
	}]);

	return Footer;
}(React.Component);

var domContainer = document.querySelector('#footer');
ReactDOM.render(React.createElement(Footer, null), domContainer);