'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var ImageDisplay = function (_React$Component) {
	_inherits(ImageDisplay, _React$Component);

	function ImageDisplay() {
		_classCallCheck(this, ImageDisplay);

		return _possibleConstructorReturn(this, (ImageDisplay.__proto__ || Object.getPrototypeOf(ImageDisplay)).apply(this, arguments));
	}

	_createClass(ImageDisplay, [{
		key: "render",
		value: function render() {
			return React.createElement(
				"div",
				{ className: "full-scale" },
				React.createElement(
					"div",
					{ className: "index-image-display", id: "image-display-yellow-transition" },
					React.createElement(
						"div",
						{ "class": "col-12" },
						React.createElement(
							"h1",
							{ "class": "text-label-center" },
							"\xBB Hauptstadtbiene"
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

	return ImageDisplay;
}(React.Component);

var elementIndex = React.createElement(ImageDisplay, null);

ReactDOM.render(elementIndex, document.getElementById('indexImageDisplay'));