
var App = React.createClass({displayName: "App",

    getInitialState: function() {
        return {
            pages: []
        }
    },

    componentDidMount: function() {
        function getPages(callback) {
            jQuery.get('/wordpress/wp-json/wp/v2/pages', function(result) {
                callback(result);
            });
        }
        var self = this;
        getPages(function(result) {
            self.setState({
                pages: result
            });
        });
    },

    render: function() {
        return (
            React.createElement("div", {className: "c-app"}, 
                this.state.pages.map(function(page, i){
                    return React.createElement(Page, {key: page.id, page: page});
                }), 

                 !this.state.pages || !this.state.pages.length ? React.createElement(Loader, null) : null
            )
        );
    }
});

ReactDOM.render(
    React.createElement(App, null),
    document.getElementById('content')
);