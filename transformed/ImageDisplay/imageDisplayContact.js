'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var ImageDisplayContact = function (_React$Component) {
	_inherits(ImageDisplayContact, _React$Component);

	function ImageDisplayContact() {
		_classCallCheck(this, ImageDisplayContact);

		return _possibleConstructorReturn(this, (ImageDisplayContact.__proto__ || Object.getPrototypeOf(ImageDisplayContact)).apply(this, arguments));
	}

	_createClass(ImageDisplayContact, [{
		key: "render",
		value: function render() {
			return React.createElement(
				"div",
				{ className: "full-scale" },
				React.createElement(
					"div",
					{ className: "contacts-image-display", id: "image-display-yellow-transition" },
					React.createElement(
						"div",
						{ "class": "col-12" },
						React.createElement(
							"h1",
							{ "class": "text-label-center" },
							"\xBB Kontakt"
						)
					)
				),
				React.createElement(
					"div",
					{ className: "col-12 yellow-arrow-padding-fix" },
					React.createElement("img", { src: "./images/arrow-25to15.png", alt: "yellow arrow" })
				)
			);
		}
	}]);

	return ImageDisplayContact;
}(React.Component);

var elementContact = React.createElement(ImageDisplayContact, null);

ReactDOM.render(elementContact, document.getElementById('contactImageDisplay'));