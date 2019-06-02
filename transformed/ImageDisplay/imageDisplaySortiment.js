'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var ImageDisplaySortiment = function (_React$Component) {
		_inherits(ImageDisplaySortiment, _React$Component);

		function ImageDisplaySortiment() {
				_classCallCheck(this, ImageDisplaySortiment);

				return _possibleConstructorReturn(this, (ImageDisplaySortiment.__proto__ || Object.getPrototypeOf(ImageDisplaySortiment)).apply(this, arguments));
		}

		_createClass(ImageDisplaySortiment, [{
				key: "render",
				value: function render() {
						return React.createElement(
								"div",
								{ className: "full-scale" },
								React.createElement("div", { className: "sortiment-image-display", id: "image-display-yellow-transition" }),
								React.createElement(
										"div",
										{ className: "col-12" },
										React.createElement("img", { src: "./images/arrow-25to15.png", alt: "yellow arrow" })
								)
						);
				}
		}]);

		return ImageDisplaySortiment;
}(React.Component);

var elementSortiment = React.createElement(ImageDisplaySortiment, null);

ReactDOM.render(elementSortiment, document.getElementById('sortimentImageDisplay'));