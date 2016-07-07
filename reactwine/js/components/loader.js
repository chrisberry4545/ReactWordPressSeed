
var Loader = React.createClass({displayName: "Loader",
    render: function() {
        return (
            React.createElement("div", {className: "loader"}, 
                "Loading..."
            )
        );
    }
});