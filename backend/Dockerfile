FROM tarantool/tarantool:2

COPY *.lua /opt/tarantool/
EXPOSE 8080
WORKDIR /opt/tarantool

CMD ["tarantool", "app.lua"]