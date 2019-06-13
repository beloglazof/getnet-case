FROM tarantool/tarantool:2

COPY *.lua /opt/tarantool/
EXPOSE 3301
WORKDIR /opt/tarantool

CMD ["tarantool", "app.lua"]