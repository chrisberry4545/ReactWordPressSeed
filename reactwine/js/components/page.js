
var Page = React.createClass({displayName: "Page",

    componentDidMount: function() {
        console.log('pages...');
        console.log(this.props.page)
    },

    render: function() {
        return (
            React.createElement("div", {className: "c-page"}, 
                React.createElement("h2", null, this.props.page.title.rendered), 
                React.createElement("div", null, 
                    this.props.page.plaintext
                )
            )
        );
    }
});